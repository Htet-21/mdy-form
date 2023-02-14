@extends('layouts.main-app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <img id="yttc-bg" src="{{ asset('/images/dinger-bg.png') }}" alt="Dinger Image">
        <div id="yttc-form-div">
            <h1 id="yttc-title">Dinger Test Donation Form</h1>
            <br>

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif

            <form method="POST" action="/donation/new">

                @csrf

                <div class="form-group">
                    <h2>Personal Information</h2>
                </div>

                <div class="form-group">
                    <label>First Name <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="Enter your payment account first name" name="fname" type="text" class="form-control" />
                    <!-- Error -->
                    @if ($errors->has('fname'))
                    <div class="alert alert-danger">
                        {{ $errors->first('fname') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Last Name <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="Enter your payment account last name" name="lname" type="text" class="form-control" />
                    <!-- Error -->
                    @if ($errors->has('lname'))
                    <div class="alert alert-danger">
                        {{ $errors->first('lname') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input placeholder="eg. info@gmail.com" name="email" type="email" class="form-control" />
                    <!-- Error -->
                    @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Phone <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="eg. 09787747310" name="phone" type="tel" class="form-control" />
                    @if ($errors->has('phone'))
                    <div class="alert alert-danger">
                        {{ $errors->first('phone') }}
                    </div>
                    @endif
                </div>

                <br />

                <div class="form-group">
                    <h2>For Payment</h2>
                </div>

                <div class="form-group">
                    <label>Amount(MMK) <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="eg. 10000" name="amount" type="text" class="form-control" />
                    @if ($errors->has('amount'))
                    <div class="alert alert-danger">
                        {{ $errors->first('amount') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="payment-type">Choose Payment <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <select id="payment-type" name="payment" class="form-control">
                        <option value="">Choose Payment</option>
                        @foreach($payment_provider_lists as $payment_provider_list)

                        <option value="{{$payment_provider_list->provider_name}}">
                            {{$payment_provider_list->provider_name}}
                        </option>

                        @endforeach
                        <option value="MAB Bank">MAB Mobile Banking</option>
                    </select>
                    @if ($errors->has('payment'))
                    <div class="alert alert-danger">
                        {{ $errors->first('payment') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="payment_method">Choose Payment Method <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <select id="payment_method" name="payment_method" class="form-control">
                        <option value=''>Choose Payment Method</option>
                        <!-- @foreach($payment_method_lists as $payment_method_list)

                        <option value="{{$payment_method_list->method_name}}">
                            {{$payment_method_list->method_name}}
                        </option>

                        @endforeach -->
                    </select>
                    @if ($errors->has('payment_method'))
                    <div class="alert alert-danger">
                        {{ $errors->first('payment_method') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" id="submit-btn">Donate</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script type='text/javascript'>
    $(document).ready(function() {

        $("#payment-type").change(function() {

            var val = $(this).val();

            if (val == "AYA Pay") {
                $("#payment_method").html("<option value='QR'>Pay with QR</option><option value='PIN'>Pay with PIN</option>");

            } else if (val == "KBZ Pay") {
                $("#payment_method").html("<option value='QR'>Pay with QR</option><option value='PWA'>Pay with KBZ Pay form</option>");

            } else if (val == "WAVE PAY") {
                $("#payment_method").html("<option value='PIN'>(Wavemoney) -Pay with form</option>");

            } else if (val == "Citizens") {
                $("#payment_method").html("<option value='PIN'>Pay with Citizens bank form</option>");

            } else if (val == "Mytel") {
                $("#payment_method").html("<option value='PIN'>Pay with PIN</option>");

            } else if (val == "Sai Sai Pay") {
                $("#payment_method").html("<option value='PIN'>Pay with PIN</option>");

            } else if (val == "Onepay") {
                $("#payment_method").html("<option value='PIN'>Pay with PIN</option>");

            } else if (val == "MPitesan") {
                $("#payment_method").html("<option value='PIN'>Pay with PIN</option>");

            } else if (val == "KBZ Direct Pay") {
                $("#payment_method").html("<option value='PWA'>Pay with KBZ Bank Direct Pay</option>");

            } else if (val == "MPU") {
                $("#payment_method").html("<option value='OTP'>Pay with OTP</option>");

            } else if (val == "Visa") {
                $("#payment_method").html("<option value='OTP'>Pay with OTP</option>");

            } else if (val == "Master") {
                $("#payment_method").html("<option value='OTP'>Pay with OTP</option>");

            } else if (val == "JCB") {
                $("#payment_method").html("<option value='OTP'>Pay with OTP</option>");

            } else if (val == "MAB Bank") {
                $("#payment_method").html("<option value='OTP'>Pay with OTP</option>");

            }

        });
    });
</script>

@endsection
@section('scripts')
@endsection
