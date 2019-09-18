<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Order;
use \App\Choice;

class OrderController extends Controller
{
  public function store(Request $request) {
    //$order = Order::create($request->all());
    //var_dump($request);
    $payload = $request->all();
    $cart = $payload["cart"];
    $user_id = $payload["userID"];

    $order_id = $payload["orderID"];
    if (is_null($order_id)) {
      $order = Order::create(['total' => $cart["cartTotal"]]);
      $order_id = $order->id;
    }

    Order::where('id', $order_id)->update(['total' => $cart["cartTotal"]]);

    Choice::where('order_id', $order_id)->delete();
    foreach ($cart['cartItems'] as $item) {
      Choice::insert(
        ['user_id' => $user_id, 'order_id' => $order_id, 'pizza_id' => $item['id'], 'quantity' => $item['quantity']]
      );
    }
    $payload["orderID"] = $order_id;
    return $payload;
  } 
}
