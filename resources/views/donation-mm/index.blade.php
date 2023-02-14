@extends('layouts.mm-app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <img id="yttc-bg" src="{{ asset('/images/dinger-bg.png') }}" alt="Dinger Background Image">
        <div id="yttc-form-div">
            <h1 id="yttc-title">Dinger Test လှူဒါန်းမှုမှတ်တမ်းပုံစံ</h1>
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
                    <h2>ကိုယ်ရေးအချက်အလက်များ</h2>
                </div>

                <div class="form-group">
                    <label>အမည်၏ ရှေ့စာလုံး <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="ဘဏ်အကောင့်အမည်၏ ရှေ့စာလုံးကိုထည့်ရန်" name="fname" type="text" class="form-control" />
                    <!-- Error -->
                    @if ($errors->has('fname'))
                    <div class="alert alert-danger">
                        {{ $errors->first('fname') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>အမည်၏ နောက်ဆုံးစာလုံး <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="ဘဏ်အကောင့်အမည်၏ နောက်ဆုံးစာလုံးကိုထည့်ရန်" name="lname" type="text" class="form-control" />
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
                    <label>ဖုန်း <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="eg. 09787747310" name="phone" type="tel" class="form-control" />
                    @if ($errors->has('phone'))
                    <div class="alert alert-danger">
                        {{ $errors->first('phone') }}
                    </div>
                    @endif
                </div>

                <br />

                <div class="form-group">
                    <h2>ငွေပေးချေရန်အချက်အလက်များ</h2>
                </div>

                <div class="form-group">
                    <label>လှူဒါန်းမည့်ငွေပမာဏ(MMK) <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input placeholder="eg. 10000" name="amount" type="text" class="form-control" />
                    @if ($errors->has('amount'))
                    <div class="alert alert-danger">
                        {{ $errors->first('amount') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="payment-type">ငွေပေးချေမည့်ဘဏ် (သို့) Pay အမျိုးအစား <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <select id="payment-type" name="payment" class="form-control">
                        <option value="">ငွေပေးချေမည့်ဘဏ် (သို့) Pay အမျိုးအစားရွေးချယ်ပါ</option>
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
                    <label for="payment_method">ငွေပေးချေမှုပုံစံ <span style="color: red !important; display: inline; float: none;">*</span></label>
                    <select id="payment_method" name="payment_method" class="form-control">
                        <option value=''>ငွေပေးချေမှုပုံစံရွေးချယ်ပါ</option>
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
                    <button type="submit" id="submit-btn">လှူဒါန်းပါမည်</button>
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
                $("#payment_method").html("<option value='QR'>QR ဖြင့် ငွေပေးချေရန်</option><option value='PIN'>App မှ ငွေပေးချေရန်</option>");

            } else if (val == "KBZ Pay") {
                $("#payment_method").html("<option value='QR'>QR ဖြင့် ငွေပေးချေရန်</option><option value='PWA'>KBZ ဖောင်မှ ငွေပေးချေရန်</option>");

            } else if (val == "WAVE PAY") {
                $("#payment_method").html("<option value='PIN'>(Wavemoney) -ဖောင်မှ ငွေပေးချေရန်</option>");

            } else if (val == "Citizens") {
                $("#payment_method").html("<option value='PIN'>Citizens bank ဖောင်မှ ငွေပေးချေရန်</option>");

            } else if (val == "Mytel") {
                $("#payment_method").html("<option value='PIN'>App မှ ငွေပေးချေရန်</option>");

            } else if (val == "Sai Sai Pay") {
                $("#payment_method").html("<option value='PIN'>App မှ ငွေပေးချေရန်</option>");

            } else if (val == "Onepay") {
                $("#payment_method").html("<option value='PIN'>App မှ ငွေပေးချေရန်</option>");

            } else if (val == "MPitesan") {
                $("#payment_method").html("<option value='PIN'>App မှ ငွေပေးချေရန်</option>");

            } else if (val == "KBZ Direct Pay") {
                $("#payment_method").html("<option value='PWA'>KBZ Bank Direct Pay မှ ငွေပေးချေရန်</option>");

            } else if (val == "MPU") {
                $("#payment_method").html("<option value='OTP'>OTP</option>");

            } else if (val == "Visa") {
                $("#payment_method").html("<option value='OTP'>OTP</option>");

            } else if (val == "Master") {
                $("#payment_method").html("<option value='OTP'>OTP</option>");

            } else if (val == "JCB") {
                $("#payment_method").html("<option value='OTP'>OTP</option>");

            } else if (val == "MAB Bank") {
                $("#payment_method").html("<option value='OTP'>OTP</option>");

            }

        });
    });
</script>

@endsection
@section('scripts')
@endsection
