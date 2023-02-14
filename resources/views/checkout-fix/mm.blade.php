@extends('layouts.mmfix-app')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div id="yttc-form-div">
            <h1 id="yttc-title">Paing's Courses</h1>
            <br>

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            <form method="POST" action="/checkout/pay">

                @csrf

                <div class="form-group">
                <h2>ကိုယ်ရေးအချက်အလက်များ</h2>
                </div>

                <div class="form-group">
                    <label>အမည် <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="eg. Aung Aung" name="customer_name" type="text" class="form-control" />
                    <!-- Error -->
                    @if ($errors->has('customer_name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('customer_name') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>အီးမေးလ် <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="eg. info@gmail.com" name="email" type="email" class="form-control" />
                    @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>

                <br />

                <div class="form-group">
                    <h2>ငွေပေးချေရန်အချက်အလက်များ</h2>
                </div>

                <div class="form-group">
                    <label>သင်တန်းများ <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <select id="payment-type" name="product_name" class="form-control">
                        <option value="Financial Literacy 101">Financial Literacy 101 ( 199$/358,200MMK )</option>
                        <option value="Selling Secrets Book">Selling Secrets Book ( 3$/5,000MMK )</option>
                        <option value="Paing VIP Mentoring Program">Paing VIP Mentoring Program ( $300 /540,000 MMK per month )</option>
                    </select>

                    @if ($errors->has('product_name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('product_name') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                <p>ကျေးဇူးပြု၍ ငွေကြေးကို ရွေးချယ်ပါ။ <span style="color: red !important; display: inline; float: none;">*</span></p>
                <input type="radio" id="mmk" name="currency" value="MMK" checked>
                <label for="mmk">MMK</label><br>
                <input type="radio" id="usd" name="currency" value="USD">
                <label for="usd">USD</label><br>
                    @if ($errors->has('currency'))
                    <div class="alert alert-danger">
                        {{ $errors->first('currency') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>ငွေပမာဏ <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input value="358200" name="amount" type="text" class="form-control" readonly/>
                    @if ($errors->has('amount'))
                    <div class="alert alert-danger">
                        {{ $errors->first('amount') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>မှတ်ချက်</label>
                    <input placeholder="Your remark" name="remark" type="text" class="form-control" />
                    <!-- Error -->
                    @if ($errors->has('remark'))
                    <div class="alert alert-danger">
                        {{ $errors->first('remark') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" id="submit-btn">Checkout</button>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection
@section('scripts')
@endsection