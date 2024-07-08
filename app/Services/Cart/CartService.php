<?php

namespace App\Services\Cart;

use Illuminate\Support\Collection;

class CartService extends Cart
{
    public function add(int $id, string $description, int $year, int $quantity = 1): void
    {
        $cartItem = $this->createCartItem($id, $description, $year, $quantity);

        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem->put('quantity', $content->get($id)->get('quantity') + $quantity);
        }

        $content->put($id, $cartItem);

        $this->session->put(self::DEFAULT_INSTANCE, $content);
    }

    public function update(int $id, string $action): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem = $content->get($id);

            switch ($action) {
                case 'increment':
                $cartItem->put('quantity', $content->get($id)->get('quantity') + 1);
                break;
                case 'decrement':
                    $updatedQuantity = $content->get($id)->get('quantity') - 1;

                    if ($updatedQuantity < self::MINIMUM_QUANTITY) {
                        $updatedQuantity = self::MINIMUM_QUANTITY;
                    }
                    $cartItem->put('quantity', $updatedQuantity);
                    break;
            }
            $content->put($id, $cartItem);

            $this->session->put(self::DEFAULT_INSTANCE, $content);
        }
    }

    public function remove(int $id): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {}
        $this->session->put(self::DEFAULT_INSTANCE, $content->except($id));
    }

    public function clear(): void
    {
        $this->session->forget(self::DEFAULT_INSTANCE);
    }

    public function content(): Collection
    {
        return is_null($this->session->get(self::DEFAULT_INSTANCE)) ?
        collect([]):
            $this->session->get(self::DEFAULT_INSTANCE);
    }

    public function total()
    {
        $content = $this->getContent();

        return $content->reduce(function ($total, $item)  {
            return $total += $item->get('year') * $item->get('quantity');
        });
    }

    public function totalQuantity(): int
    {
        $content =  is_null($this->session->get(self::DEFAULT_INSTANCE)) ?
            collect([]):
            $this->session->get(self::DEFAULT_INSTANCE);
        return $content->count();
    }
}
