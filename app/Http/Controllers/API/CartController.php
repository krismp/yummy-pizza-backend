<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Cart;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Cart as CartResource;
use Illuminate\Validation\Rule;

class CartController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::all();

        return $this->sendResponse(CartResource::collection($carts), 'Carts retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $input = $request->all();

        $cart->user_id = $input['user_id'];
        $cart->save();

        return $this->sendResponse(new CartResource($cart), 'Cart updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return $this->sendResponse([], 'Cart deleted successfully.');
    }
}
