@extends('layouts.admin-app')

@section('title')
Payment Provider | YTTC
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payment Provider List</h4>
            </div>
            <div class="card-body">

            <a href="{{ url('/payment-provider/create') }}"><button class="btn btn-primary">Add New</button></a>

                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Payment Provider Name
                            </th>
                            <th class="th-right">
                                Edit
                            </th>
                        </thead>
                        <tbody>
                            @foreach($payment_provider_lists as $payment_provider_list)
                            <tr>
                                <td>
                                    {{$payment_provider_list->id}}
                                </td>

                                <td>
                                    {{$payment_provider_list->provider_name}}
                                </td>

                                <td class="text-right">

                                  <a href="/payment-provider/edit/{{$payment_provider_list->id}}"><input style="margin-top:10px;" class="btn btn-success" type="button" value="Edit" /></a>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div id="paginate-div">
                        {{ $payment_provider_lists ?? ''->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
