<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'text' => ['required']
        ]);
        $request->merge([
            'user_id' => Auth::user()->id,
            'like' => 0
        ]);
        Comments::create($request->all());
        return redirect()->back();
    }
}
