@extends('layouts.main-app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <img id="yttc-bg" src="{{ asset('/images/dinger-bg.png') }}" alt="Dinger Image">
        <div id="yttc-form-div">

            <div class="container">
                <h1 id="yttc-title">Dinger Donation</h1>
                <br>
                <p style="color:dodgerblue;">Please check your donation data</p>
                <br>
                <p>Name : {{$donationData->name}}</p>
                <p>Phone : {{$donationData->phone}}</p>
                <p>Payment Provider : {{$donationData->payment}}</p>
                <p>Donation Amount = {{$donationData->amount}} MMK</p>
                <br>

                @if($donationData->payment == 'MPU')
                <a href="https://portal.dinger.asia/gateway/mpu?transactionNumber=<?php echo $transactionNum; ?>&formToken=<?php echo $formToken; ?>"><button id="confirm-btn"> Confirm </button></a>
                @endif

                @if($donationData->payment == 'Visa')
                <a href="https://creditcard-portal.dinger.asia/?merchantOrderId=<?php echo $merchOrderId; ?>&transactionNum=<?php echo $transactionNum; ?>&formToken=<?php echo $formToken; ?>"><button id="confirm-btn"> Confirm </button></a>
                @endif

                @if($donationData->payment == 'Master')
                <a href="https://creditcard-portal.dinger.asia/?merchantOrderId=<?php echo $merchOrderId; ?>&transactionNum=<?php echo $transactionNum; ?>&formToken=<?php echo $formToken; ?>"><button id="confirm-btn"> Confirm </button></a>
                @endif

                @if($donationData->payment == 'JCB')
                <a href="https://creditcard-portal.dinger.asia/?merchantOrderId=<?php echo $merchOrderId; ?>&transactionNum=<?php echo $transactionNum; ?>&formToken=<?php echo $formToken; ?>"><button id="confirm-btn"> Confirm </button></a>
                @endif

                @if($donationData->payment != 'MPU' && $donationData->payment != 'Visa' && $donationData->payment != 'Master' && $donationData->payment != 'JCB')
                <a href="https://portal.dinger.asia/gateway/redirect?transactionNo=<?php echo $transactionNum; ?>&formToken=<?php echo $formToken; ?>&merchantOrderId=<?php echo $merchOrderId; ?>"><button id="confirm-btn"> Confirm </button></a>
                @endif

                <br>

                <div id="successful-content">

                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN -->
                <script type='text/javascript'>
                    setInterval(function() {
                        $('#successful-content').load('/pin-getData/<?php echo $donationID; ?>');
                    }, 2000)
                </script>

            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
