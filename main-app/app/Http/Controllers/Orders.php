<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Orders extends Controller
{
 
    public function index(){
        $orders = Http::get('http://127.0.0.1:8000/api/orders')->collect();
        return view('firebase.orders.index', compact('orders')) ;
    }


    public function create(){
        return view('firebase.orders.create');
    }

    public function store(Request $request){
        //send request to our middleware and save data in database
         $response = Http::post('http://127.0.0.1:8000/api/store', [
            'title' => $request['title'],
            'total' => $request['quantity'],
        ]);

        if($request['quantity'] && $request['title']){
            //send email with order details
            Mail::send('email.orderAdded', $request->toArray(), function($message){
                $message->to('abousafa088@gmail.com')->subject('Order Created');
            });
            return redirect('orders')->with('status', 'Order Added Successfully');
        }else{
            return redirect('orders')->with('status', 'Something went wrong');
        }
    }
    
}
