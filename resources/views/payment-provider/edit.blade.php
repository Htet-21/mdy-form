@extends('layouts.admin-app')
@section('title')
Payment Provider | YTTC
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h1 id="clt-header">Update Payment Provider</h1>
            </div>
            <div class="card-body">

                {!! Form::model($payment_provider_edit, ['method'=>'PATCH', 'action' => ['ProviderController@update', $payment_provider_edit->id], 'id' => 'create-form']) !!}

                @csrf

                <div class="form-group">
                    {!! Form::text('provider_name', null, ['class'=>'form-control', 'value'=>'{{$payment_provider_edit->provider_name}}']) !!}
                </div>

                @if ($errors->has('provider_name'))
                <div class="alert alert-danger">
                    {{ $errors->first('provider_name') }}
                </div>
                @endif

                <div class="form-group">
                    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

                {!! Form::open(['method'=>'get', 'url' => ['/payment-provider/delete', $payment_provider_edit->id]]) !!}
                @csrf

                <input id="delete-btn" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger" type="submit" value="Delete" />

                {!! Form::close() !!}

                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

            </div>
        </div>
    </div>

</div>



@endsection

@section('scripts')
@endsection