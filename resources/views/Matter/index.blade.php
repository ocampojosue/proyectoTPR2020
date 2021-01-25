@extends('layouts.app')
@section('content')
<div class="container">
  <a href="{{route('matter.create')}}" class="btn btn-success">Add New Matter</a><br><br>
  <table class="table table-light table-hover">
    <thead class="thead-light table-hover">
      <tr>
        <th>#</th>
        <th>ID Matter</th>
        <th>Matter Name</th>
        <th>Actions</th>
      </tr>    
    </thead>
    <tbody>
    @foreach($matters as $matter)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$matter->id}}</td>
        <td>{{$matter->matter_name}}</td>
        <td>
          <a href="{{route ('matter.edit',$matter->id)}}" class="btn btn-warning">EDIT
            {{@method_field('PUT')}}
          </a>
          <a href="{{route ('matter.show',$matter->id)}}" class="btn btn-primary">SHOW
          </a>
          <form action="{{route ('matter.destroy',$matter->id)}}" method="post" style="display:inline">
            {{@csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-danger" type="submit" onclick="return confirm('Confirm to Delete')">DELETE</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody> 
  </table>
</div>
@endsection