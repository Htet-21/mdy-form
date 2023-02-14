@extends('forms.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mandalay Event Registered List</h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Company</th>
        </tr>
        @foreach ($forms as $form)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $form->name }}</td>
            <td>{{ $form->phone }}</td>
            <td>{{ $form->company }}</td>
            <td>
                
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $forms->links() !!}
      
@endsection