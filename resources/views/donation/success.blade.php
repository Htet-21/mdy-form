@extends('layouts.main-app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <img id="yttc-bg" src="{{ asset('/images/dinger-bg.png') }}" alt="Dinger Image">
        <div id="yttc-form-div">
            <h1 id="yttc-title">Dinger Donation</h1>
            <br>
            <div class="alert alert-success">
                Your Donation was Successfully.
            </div>
            <div class="container">
                <!-- <p style="text-align:left;">{{$scan_qr}}</p>
           
                <div id="qr-div">{!! QrCode::size(250)->generate("$pay_qr"); !!}</div>
            </div> -->

                <!-- @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif -->

            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    @endsection