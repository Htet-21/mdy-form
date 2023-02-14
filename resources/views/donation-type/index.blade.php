@extends('layouts.admin-app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Donation Type List</h4>
            </div>
            <div class="card-body">

            <a href="{{ url('/donation-type/create') }}"><button class="btn btn-primary">Add New</button></a>

                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Donation Type Name
                            </th>
                            <th class="th-right">
                                Edit
                            </th>
                        </thead>
                        <tbody>
                            @foreach($donation_type_lists as $donation_type_list)
                            <tr>
                                <td>
                                    {{$donation_type_list->id}}
                                </td>

                                <td>
                                    {{$donation_type_list->donation_type_name}}
                                </td>

                                <td class="text-right">

                                  <a href="/donation-type/edit/{{$donation_type_list->id}}"><input style="margin-top:10px;" class="btn btn-success" type="button" value="Edit" /></a>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div id="paginate-div">
                        {{ $donation_type_lists ?? ''->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
