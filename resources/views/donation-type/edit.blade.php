@extends('layouts.admin-app')
@section('title')
Donation Type Edit | YTTC
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h1 id="clt-header">Update Donation Type</h1>
            </div>
            <div class="card-body">

                {!! Form::model($donation_type_edit, ['method'=>'PATCH', 'action' => ['DonationTypeController@update', $donation_type_edit->id], 'id' => 'create-form']) !!}

                @csrf

                <div class="form-group">
                    {!! Form::text('donation_type_name', null, ['class'=>'form-control', 'placeholder'=>'Donation Type Name', 'value'=>'{{$donation_type_edit->donation_type_name}}']) !!}
                </div>

                @if ($errors->has('donation_type_name'))
                <div class="alert alert-danger">
                    {{ $errors->first('donation_type_name') }}
                </div>
                @endif

                <div class="form-group">
                    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

                {!! Form::open(['method'=>'get', 'url' => ['/donation-type/delete', $donation_type_edit->id]]) !!}
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