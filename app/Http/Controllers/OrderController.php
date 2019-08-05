<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Dnetix\Redirection\Message\RedirectInformation;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $order = new Order();

        $order->customer_name = $request->customer_name;
        $order->customer_email = $request->customer_email;
        $order->customer_mobile = $request->customer_mobile;
        $order->product_name = $request->product_name;
        $order->product_description = $request->product_description;
        $order->product_price = $request->product_price;

        $placetopay = new PlacetoPay([
            'login' => '{{your_login}}',
            'tranKey' => '{{your_tranKey}}',
            'url' => 'https://dev.placetopay.com/redirection/',
        ]);

        $reference = 'id_' . time();

        
        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => $request->product_description,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $request->product_price,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => 'http://localhost/prueba-placetopay/public/orders/',
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        $response = $placetopay->request($request);

        

        $order->reference = $reference;
        $order->requestId = $response->requestId();
        $order->processUrl = $response->processUrl();

        $order->save();

        if ($response->isSuccessful()) {

            return redirect($response->processUrl());
            
        } else {
            // There was some error so check the message and log it
            $response->status()->message();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $placetopay = new PlacetoPay([
            'login' => '{{your_login}}',
            'tranKey' => '{{your_tranKey}}',
            'url' => 'https://dev.placetopay.com/redirection/',
        ]);

        $order = Order::find($id);

        $reference = $order->reference;
        

        $response = $placetopay->query($order->requestId);

        $order = Order::find($id);

        $processUrl = $order->processUrl;

        

        $order->status = $response->status()->status();

        $order->save();

        return view('orders.show',compact('response','reference','processUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
