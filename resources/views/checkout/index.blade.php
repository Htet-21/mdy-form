@extends('layouts.main-app')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div id="top-section">
            <div class="top-content">
                <img id="chat" src="{{ asset('images/date.png') }}" alt="chat">
                <h1 id="mdy-title">2023 နှစ်သစ်ကူးစျေးရောင်းပွဲတော်</h1>
                
                <p id="mdy-p">Feb 17,18,19 ရကနေ့ Mingalar Mandalay Hotel ဝန်းထဲမှာ MRCCI မှ ကြီးမှူးကျင်းပမယ့်
                    ဒီပွဲလေးမှာ
                    <br> ကျွန်တော်တို့ Dinger လဲ Booth No.(18)မှာ အတူရှိနေမှာပါ။ <br>
                    <button id="create-acc-btn" >Register</button>
                </p>
                <img id="map" src="{{ asset('images/map.png') }}" alt="map">
            </div>
        </div>
        <div id="mid-section">
            <div class="mid-content">
                <div class="row">
                    <div class="mid-text">
                        <h1><span>50% </span> အထိ ဒစ်စကောင့်ပေးသွားမယ့် <br><span>promotions</span> အစီအစဉ်များ</h1>
                        <br>
                        <p>Dinger ဟာ စီးပွါးရေးလုပ်ငန်းတွေအတွက် Payments ပေါင်းစုံကနေ ငွေလက်ခံနိုင်အောင် <br>
                            ဆောင်ရွက်ပေးလျှက် ရှိပါတယ်။ Dinger ကနေ တစ်ခါမှ မပေးဖူးသေးတဲ့ 50% အထိ <br> discount
                            ခံစားနိုင်မယ့် promotions တွေလဲ အခုပွဲမှာ ပေးဖို့ရှိတာမို့ လှမ်းလာခဲ့ဖို့ မမေ့နဲ့နော်။</p>
                        
                        <img id="detail" src="{{ asset('images/calendar.png') }}" alt="map">
                        <img id="detail2" src="{{ asset('images/time.png') }}" alt="map">
                        <img id="detail3" src="{{ asset('images/location.png') }}" alt="map">
                    </div>
                    <div class="col-md-6 col-sm-12 col-12 p-0">
                        <img src="{{ asset('images/50%.png') }}" alt="map">

                    </div>
                </div>
            </div>
        </div>
        <div id="bot-section">
            <div class="bot-content">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12 p-0">
                        <img src="{{ asset('images/person.png') }}" alt="map">
                    </div>
                    <div id="yttc-form-div">
                        <h1 id="yttc-title"></h1>
                        <br>

                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif

                        <form action="{{ route('forms.store') }}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label>Full name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your fullname">
                            </div>

                            <div class="form-group">
                                <label>Phone number</label>
                                <input placeholder="Enter your phone number" name="phone" type="text"
                                    class="form-control" />
                            </div>

                            <div class="form-group">
                                <label>Company (Optional)</label>
                                <input placeholder="Enter company name" name="company" type="text"
                                    class="form-control" />

                            </div>

                            <div class="form-group">
                                <button type="submit" id="submit-btn">Register</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
@section('scripts')
@endsection