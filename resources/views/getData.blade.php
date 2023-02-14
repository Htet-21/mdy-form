<div class="row">

    <div class="col-md-12">

        @if($callbackData->transactionStatus =='SUCCESS')
        <div id="success-icon">
            <img src="{{ asset('images/check.png') }}" />
        </div>
        <br>
        <p style="color:green;">Thanks {{$callbackData->customerName}}. Your donation amount {{$callbackData->totalAmount}} MMK was successfully donated to Dinger.</p>
        @endif

        @if($callbackData->transactionStatus =='ERROR')
        <p style="color:red;">Try again {{$callbackData->customerName}}. Your donation amount {{$callbackData->totalAmount}} MMK was failed to donate.</p>
        @endif

    </div>

</div>