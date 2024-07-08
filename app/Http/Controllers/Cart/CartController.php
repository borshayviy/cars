<?php

namespace App\Http\Controllers\Cart;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index', [
            'cars' => Cart::content()
        ]);
    }

    public function store(Request $request)
    {
        $item = [
            'id' => (int) $request->input('id'),
            'description' => (string) $request->input('description'),
            'year' => (int) $request->input('year'),
        ];
        Cart::add($item['id'], $item['description'], $item['year']);
        return redirect()->back()->with('alert-cart', 'Товар успешно добавлен!');
    }

    public function remove(int $id)
    {
        Cart::remove($id);
        return redirect()->back()->with('alert-cart', 'Товар удален!');
    }

    public function send(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'wallet' => 'required'
        ]);

        $cart = Cart::content();
        DB::beginTransaction();
        $orderID = Orders::create([
            'user_id' => \auth()->user()->id,
            'total_year' => (integer) Cart::total(),
            'wallet' => $request->input('wallet'),
            'qty' => Cart::totalQuantity()
        ]);
        if (is_null($orderID)) {
            DB::rollBack();
            return redirect()->back()->with('alert-error', 'Ошибка в заказе:');
        }
        DB::commit();
        foreach ($cart as $item) {
            OrderItems::create([
                'car_id' => $item['id'],
                'order_id' => $orderID->id,
                'total' => (integer) $item['year'] * $item['quantity'],            ]);
        }
        return redirect()->back()->with('alert-cart', 'Заказ оформлен');
    }

}
