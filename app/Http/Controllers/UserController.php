<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \App\User;
use \App\Http\Resources\User as UserResource;

class UserController extends Controller
{
  public function show($email) {
    $user = User::where('email', '=', $email)->first();
    if ($user){
      return new UserResource($user);
    }
    return response()->json(['message' => 'not found'], 404);
  }

  public function store(Request $request) {
    $user = User::create($request->all());
    return (new UserResource($user))->response()->setStatusCode(201);
  }

  public function update(Request $request) {
    // todo
  }
}
