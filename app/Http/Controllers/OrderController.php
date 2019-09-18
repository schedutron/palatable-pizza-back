<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Order;
use \App\Choice;
use \App\User;

class OrderController extends Controller {
  public function store(Request $request) {
    $payload = $request->all();
    $cart = $payload["cart"];
    $user = $payload["user"];

    $order_id = $cart["orderID"];
    if (is_null($order_id)) {
      $order = Order::create(['total' => $cart["cartTotal"]]);
      $order_id = $order->id;
    }

    Order::where('id', $order_id)->update(['total' => $cart["cartTotal"]]);

    Choice::where('order_id', $order_id)->delete();
    foreach ($cart['cartItems'] as $item) {
      Choice::insert(
        ['user_id' => $user["id"], 'order_id' => $order_id, 'pizza_id' => $item['id'], 'quantity' => $item['quantity']]
      );
    }

    User::where('id', $user["id"])->update(["address" => $user["address"], "phone_number" => (int) $user["phone_number"]]);

    $payload["cart"]["orderID"] = $order_id;
    return $payload;
  }

  public function payment_success(Request $request) {
    $payload = $request->all();
    // check and record payment
    Order::where('id', $payload["orderID"])->update(['completed' => true, 'stripe_token' => $payload["stripeToken"]]);
    return ['message' => 'Payment Successful! The order has reached our kitchens!'];
  }
}
