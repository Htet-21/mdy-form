@extends('layouts.admin-app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users List</h4>
            </div>
            <div class="card-body">

                <a href="{{ url('/register') }}"><button class="btn btn-primary">Add New User</button></a>

                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                User Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th class="th-right">
                                Edit
                            </th>
                        </thead>
                        <tbody>
                            @foreach($users_lists as $users_list)
                            <tr>
                                <td>
                                    {{$users_list->id}}
                                </td>

                                <td>
                                    {{$users_list->name}}
                                </td>

                                <td>
                                    {{$users_list->email}}
                                </td>

                                <td class="text-right">

                                    <p><a href="/user-edit/{{$users_list->id}}"><input style="margin-top:10px;" class="btn btn-success" type="button" value="Edit" /></a></p>

                                    {!! Form::open(['method'=>'get', 'url' => ['/user/delete', $users_list->id]]) !!}
                                    @csrf

                                    <input onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger" type="submit" value="Delete" />

                                    </form>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div id="paginate-div">
                        {{ $users_lists ?? ''->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection