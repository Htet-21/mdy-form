@extends('layouts.admin-app')
@section('title')
Payment Method | YTTC
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h1 id="clt-header">Update Payment Method</h1>
            </div>
            <div class="card-body">

                {!! Form::model($payment_method_edit, ['method'=>'PATCH', 'action' => ['MethodController@update', $payment_method_edit->id], 'id' => 'create-form']) !!}

                @csrf

                <div class="form-group">
                    {!! Form::text('method_name', null, ['class'=>'form-control', 'placeholder'=>'Method Name', 'value'=>'{{$payment_method_edit->method_name}}']) !!}
                </div>

                @if ($errors->has('method_name'))
                <div class="alert alert-danger">
                    {{ $errors->first('method_name') }}
                </div>
                @endif

                <div class="form-group">
                    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

                {!! Form::open(['method'=>'get', 'url' => ['/payment-method/delete', $payment_method_edit->id]]) !!}
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