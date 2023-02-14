<?php

namespace App\Http\Controllers;

use App\DonationType;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\DonationTypeRequest;

class DonationTypeController extends Controller
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
        $donation_type_lists = DB::table('donation_type')->orderBy('id', 'DESC')->paginate(10);
        return view('donation-type.index', compact('donation_type_lists'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('donation-type.create');
    }

    public function add(DonationTypeRequest $request)
    {
        $input = $request->all();

        DonationType::create($input);

        return back()->with('success', 'Donation Type created successfully');
    }

    public function edit($id)
    {
        //
        $donation_type_edit = DonationType::findOrFail($id);

        return view('donation-type.edit', compact('donation_type_edit'));
    }

    public function update(DonationTypeRequest $request, $id)
    {
        //
        DonationType::whereId($id)->first()->update($request->all());

        return back()->with('success', 'Updated Donation Type Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        DonationType::whereId($id)->delete();

        return redirect('/donation-type');
    }

}
