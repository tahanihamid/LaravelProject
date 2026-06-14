<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|in:cash,card',
            'items' => 'required|string',
            'total' => 'required|numeric',
        ]);

        Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'items' => $request->items,
            'total' => $request->total,
            'status' => 'new',
        ]);

        return response()->json(['success' => true]);
    }
}