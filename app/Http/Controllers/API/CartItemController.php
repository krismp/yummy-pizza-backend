<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\CartItem;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CartItem as CartItemResource;
use Illuminate\Validation\Rule;

class CartItemController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_items = CartItem::all();

        return $this->sendResponse(CartItemResource::collection($cart_items), 'CartItems retrieved successfully.');
    }

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
            'cart_id' => 'required',
            'total' => 'required|integer',
            'total_price_in_usd' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $cart_item = CartItem::create($input);

        return $this->sendResponse(new CartItemResource($cart_item), 'CartItem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart_item = CartItem::find($id);
        if (is_null($cart_item)) {
            return $this->sendError('CartItem not found.');
        }

        return $this->sendResponse(new CartItemResource($cart_item), 'CartItem retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartItem $cart_item)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'product_id' => 'required',
            'cart_id' => 'required',
            'total' => 'required|integer',
            'total_price_in_usd' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $cart_item->product_id = $input['product_id'];
        $cart_item->cart_id = $input['cart_id'];
        $cart_item->total = $input['total'];
        $cart_item->save();

        return $this->sendResponse(new CartItemResource($cart_item), 'CartItem updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem $cart_item)
    {
        $cart_item->delete();

        return $this->sendResponse([], 'CartItem deleted successfully.');
    }
}
