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
    public function index(Request $request)
    {
        $user_id = $request->input('user_id');
        $orders = Order::where('user_id', $user_id)->take(5)->get();

        return $this->sendResponse(OrderResource::collection($orders), 'Orders retrieved successfully.');
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
            'cart_id' => 'required',
            'address' => 'required',
            'delivery_cost_in_usd' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'final_price_in_usd' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $product = Order::create($input);

        return $this->sendResponse(new OrderResource($product), 'Order created successfully.');
    }
}
