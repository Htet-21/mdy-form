<?php

namespace App\Http\Controllers;

use App\DonationTypeMm;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\DonationTypeRequest;

class DonationTypeMmController extends Controller
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
        $donation_type_lists = DB::table('donation_type_mm')->orderBy('id', 'DESC')->paginate(10);
        return view('donation-type-mm.index', compact('donation_type_lists'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('donation-type-mm.create');
    }

    public function add(DonationTypeRequest $request)
    {
        $input = $request->all();

        DonationTypeMm::create($input);

        return back()->with('success', 'Donation Type created successfully');
    }

    public function edit($id)
    {
        //
        $donation_type_edit = DonationTypeMm::findOrFail($id);

        return view('donation-type-mm.edit', compact('donation_type_edit'));
    }

    public function update(DonationTypeRequest $request, $id)
    {
        //
        DonationTypeMm::whereId($id)->first()->update($request->all());

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
        DonationTypeMm::whereId($id)->delete();

        return redirect('/donation-type-mm');
    }

}
