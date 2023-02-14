@extends('layouts.admin-app')

@section('title')
Payment Method | YTTC
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payment Method List</h4>
            </div>
            <div class="card-body">

            <a href="{{ url('/payment-method/create') }}"><button class="btn btn-primary">Add New</button></a>

                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Payment Method Name
                            </th>
                            <th class="th-right">
                                Edit
                            </th>
                        </thead>
                        <tbody>
                            @foreach($payment_method_lists as $payment_method_list)
                            <tr>
                                <td>
                                    {{$payment_method_list->id}}
                                </td>

                                <td>
                                    {{$payment_method_list->method_name}}
                                </td>

                                <td class="text-right">

                                  <a href="/payment-method/edit/{{$payment_method_list->id}}"><input style="margin-top:10px;" class="btn btn-success" type="button" value="Edit" /></a>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div id="paginate-div">
                        {{ $payment_method_lists ?? ''->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
