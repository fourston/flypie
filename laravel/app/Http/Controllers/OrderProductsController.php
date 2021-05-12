<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderProducts;
use App\Http\Resources\OrderProductsResource;


class OrderProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderProductsResource::collection(OrderProducts::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderProducts = OrderProducts::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return new OrderProductsResource($orderProducts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProducts $orderProducts)
    {
        return new OrderProductsResource($orderProducts);
    }
}
