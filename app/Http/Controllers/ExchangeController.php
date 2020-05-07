<?php

namespace App\Http\Controllers;

use App\Exchange;
use Illuminate\Http\Request;
use App\Order;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $exchanges = Exchange::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        return view('exchange.index', compact('exchanges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('exchange.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
          'currency'  => 'required',
          'exchange_rate' => 'required'
        ]);

        auth()->user()->exchanges()->create([
           'currency' => $request->currency,
           'exchange_rate' => $request->exchange_rate
        ]);

        return redirect('/exchanges')->with([
          'flash_message' => 'FX Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange $exchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        //
        $model = Exchange::find($exchange->id);

        return view('exchange.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        //
        $this->validate($request, [
            'currency'  => 'required',
            'exchange_rate' => 'required'
          ]);

          $model = Exchange::find($exchange->id);

          $model->currency = $request->currency;
          $model->exchange_rate = $request->exchange_rate;
          $model->update();


          return redirect('/exchanges')->with([
           'flash_message' => 'FX Updated Successfully'
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        //
        $model = Exchange::find($exchange->id);
        $model->delete();
        return back();
    }

    public function requestFx($id)
    {
       $model = new Order();
       $model->user_id = auth()->id();
       $model->exchange_id = $id;
       $model->status =  '0';
       $model->save();
       return redirect('/home')->with([
         'flash_message' => 'FX request Order Created Successfully'
       ]);

    }

    
}
