@extends('layouts.admin-app')

@section('title')
Order Detail | Paing's Courses
@endsection

@section('content')

<div id="renewed-driver" class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">

        <h1 style="text-align:left;" id="edit-license-type">Order Detail</h1>

        <p>Name: {{$donation_detail->name}}</p>
        <hr>

        <p>Phone: {{$donation_detail->phone}}</p>
        <hr>

        <p>Donate ID: {{$donation_detail->donate_id}}</p>
        <hr>

        <p>Donation Amount: {{$donation_detail->amount}}</p>
        <hr>

        <p>Payment Provider: {{$donation_detail->payment}}</p>
        <hr>

        <p>Payment Method: {{$donation_detail->payment_method}}</p>
        <hr>
        
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')

@endsection