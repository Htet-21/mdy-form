@extends('layouts.admin-app')
@section('title')
Payment Provider | YTTC
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h1 id="clt-header">Add New Payment Provider</h1>
            </div>
            <div class="card-body">
                {!! Form::open(['url' =>'/payment-provider/add', 'id'=>'create-form']) !!}

                @csrf

                <div class="form-group">
                    {!! Form::text('provider_name', null, ['class'=>'form-control', 'placeholder'=>'Payment Provider Name']) !!}
                </div>

                @if ($errors->has('provider_name'))
                <div class="alert alert-danger">
                    {{ $errors->first('provider_name') }}
                </div>
                @endif

                <div class="form-group">
                    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

@endsection

@section('scripts')
@endsection