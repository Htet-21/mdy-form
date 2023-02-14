<?php

namespace App\Http\Controllers;

use App\Method;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\MethodRequest;

class MethodController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function index()
    {
        $payment_method_lists = DB::table('payment_method')->orderBy('id', 'DESC')->paginate(10);
        return view('payment-method.index', compact('payment_method_lists'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('payment-method.create');
    }

    public function add(MethodRequest $request)
    {
        $input = $request->all();

        Method::create($input);

        return back()->with('success', 'Payment Method was created successfully');
    }

    public function edit($id)
    {
        //
        $payment_method_edit = Method::findOrFail($id);

        return view('payment-method.edit', compact('payment_method_edit'));
    }

    public function update(MethodRequest $request, $id)
    {
        //
        Method::whereId($id)->first()->update($request->all());

        return back()->with('success', 'Updated Payment Method Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Method::whereId($id)->delete();

        return redirect('/payment-method');
    }

}
