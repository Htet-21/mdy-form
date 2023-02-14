<?php

namespace App\Http\Controllers;

use App\Provider;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\ProviderRequest;

class ProviderController extends Controller
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
        $payment_provider_lists = DB::table('payment_provider')->orderBy('id', 'DESC')->paginate(10);
        return view('payment-provider.index', compact('payment_provider_lists'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('payment-provider.create');
    }

    public function add(ProviderRequest $request)
    {
        $input = $request->all();

        Provider::create($input);

        return back()->with('success', 'Payment Provider was created successfully');
    }

    public function edit($id)
    {
        //
        $payment_provider_edit = Provider::findOrFail($id);

        return view('payment-provider.edit', compact('payment_provider_edit'));
    }

    public function update(ProviderRequest $request, $id)
    {
        //
        Provider::whereId($id)->first()->update($request->all());

        return back()->with('success', 'Updated Payment Provider Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Provider::whereId($id)->delete();

        return redirect('/payment-provider');
    }

}
