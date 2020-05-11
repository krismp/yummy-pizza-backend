<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Order;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Order as OrderResource;
use Illuminate\Validation\Rule;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Order::all();

        return $this->sendResponse(OrderResource::collection($products), 'Orders retrieved successfully.');
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
            'cart_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $product = Order::create($input);

        return $this->sendResponse(new OrderResource($product), 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Order::find($id);
        if (is_null($product)) {
            return $this->sendError('Order not found.');
        }

        return $this->sendResponse(new OrderResource($product), 'Order retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $product)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'cart_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $product->cart_id = $input['cart_id'];
        $product->user_id = $input['user_id'];
        $product->status = $input['status'];
        $product->save();

        return $this->sendResponse(new OrderResource($product), 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $product)
    {
        $product->delete();

        return $this->sendResponse([], 'Order deleted successfully.');
    }
}
