<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Checkout;

use App\Callback;

use App\Http\Requests\CheckoutRequest;

use App\Http\Requests\DateFilterRequest;

class AdminDonationController extends Controller
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

    public function transaction_all()
    {
        $donation_lists = DB::table('prebuild_checkout_payment')->orderBy('id', 'DESC')->paginate(10);
        return
            view('dashboard.index',compact('donation_lists'));
    }

    public function transaction_success()
    {
        $donation_lists = DB::table('prebuild_checkout_payment')->where('transaction_status', 'SUCCESS')->orderBy('id', 'DESC')->paginate(10);
        return
            view('dashboard.success',compact('donation_lists'));
    }

    public function transaction_error()
    {
        $donation_lists = DB::table('prebuild_checkout_payment')->where('transaction_status', 'ERROR')->orderBy('id', 'DESC')->paginate(10);
        return
            view('dashboard.error',compact('donation_lists'));
    }

    public function callback_list()
    {

        $donation_lists = DB::table('prebuild_checkout_payment')->where('transaction_status', 'SUCCESS')->orderBy('id', 'DESC')->paginate(10);
        return
            view('transaction-tables.success', compact('donation_lists'));
    }

    public function error_list()
    {

        $donation_lists = DB::table('prebuild_checkout_payment')->where('transaction_status', 'ERROR')->orderBy('id', 'DESC')->paginate(10);
        return
            view('transaction-tables.error', compact('donation_lists'));
    }

    public function list()
    {

        $donation_lists = DB::table('prebuild_checkout_payment')->orderBy('id', 'DESC')->paginate(10);
        return
            view('transaction-tables.index', compact('donation_lists'));
    }

    public function detail($id)
    {
        //
        $donation_detail = Checkout::findOrFail($id);
        return view('dashboard.donation-detail', compact('donation_detail'));
    }

    public function success_detail($id)
    {
        //
        $donation_detail = Checkout::where('donate_id', $id)->first();
        return view('dashboard.success-detail', compact('donation_detail'));
    }

    public function error_detail($id)
    {
        //
        $donation_detail = Checkout::where('donate_id', $id)->first();
        return view('dashboard.error-detail', compact('donation_detail'));
    }

    public function edit($id)
    {
        //
        $donation_edit = Checkout::findOrFail($id);
        return view('donation.edit', compact('donation_edit'));
    }

    public function update(CheckoutRequest $request, $id)
    {
        //
        Donation::whereId($id)->first()->update($request->all());
        return back()->with('success', 'Updated Order info Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Donation::whereId($id)->delete();

        return redirect('/donation');
    }
}
