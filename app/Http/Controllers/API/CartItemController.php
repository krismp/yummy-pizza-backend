<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CartItem as CartItemResource;
use Illuminate\Validation\Rule;

class CartItemController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'product_id' => 'required',
            'total' => 'required|integer',
            'total_price_in_usd' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if ($input['cart_id'] == null) {
            $cart = Cart::create([
                'user_id' => $input['user_id']
            ]);
            $cart_item = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $input['product_id'],
                'total' => $input['total'],
                'total_price_in_usd' => $input['total_price_in_usd'],
            ]);
        } else {
            $cart = Cart::find($input['cart_id']);
            $cart_item = CartItem::where('cart_id', $input['cart_id'])
                ->where('product_id', $input['product_id'])->first();
            if ($cart_item) {
                $cart_item->total += $input['total'];
                $cart_item->total_price_in_usd += $input['total_price_in_usd'];
                $cart_item->save();
            } else {
                $cart_item = CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $input['product_id'],
                    'total' => $input['total'],
                    'total_price_in_usd' => $input['total_price_in_usd'],
                ]);
            }
        }

        return $this->sendResponse(new CartItemResource($cart_item), 'Successfully added to cart.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart_item = CartItem::find($id);
        $cart_item->delete();

        return $this->sendResponse([], 'CartItem deleted successfully.');
    }
}
