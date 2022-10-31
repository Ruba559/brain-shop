<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function getOrderByUserId($id)
    {
        return OrderResource::collection(Order::OrderByUserId($id));
    }

    public function getOrderByDeliveryId($id)
    {
        return OrderResource::collection(Order::OrderByDeliveryId($id));
    }

    public function getOrderByEmployeeId($id)
    {
        return OrderResource::collection(Order::OrderByEmployeeId($id));
      
    }

    public function getNew()
    {
        return  OrderResource::collection(Order::New());
    }

    public function getShipping()
    {
        return OrderResource::collection(Order::Shipping());
    }

    public function getOrdered()
    {
        return  OrderResource::collection(Order::Ordered());
    }
   
    public function index()
    {
        return OrderResource::collection(Order::get());
    }

  
    public function create()
    {
       //
    }

   
    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required',
            'delivery_id' => 'required',
            'status' => 'required',
            'total_price'=>'required',
            'employee_id'=>'required',
        ]);

        $order = Order::create([
            'user_id' => $request->user_id,
            'delivery_id' => $request->delivery_id,
            'status' => $request->status,
            'total_price'=> $request->total_price,
            'employee_id'=> $request->employee_id,
        ]);

       
        return response($order, 201);
    }

 
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'delivery_id' => 'required',
        //     'status' => 'required',
        //     'total_price'=>'required',
        //     'employee_id'=>'required',
        // ]);

        $order= Order::find($id); 

        $order->update($request->all());

        // $order->update([
        //     'delivery_id' => $request->delivery_id,
        //     'status' => $request->status,
        //     'total_price'=> $request->total_price,
        //     'employee_id'=> $request->employee_id,
        //     'user_id' => $request->user_id,
        // ]);

       
        return response($order, 201);
    }

  
    public function destroy($id)
    {
        $order= Order::find($id); 

        $order->delete();

        return response($order, 201);

    }
}
