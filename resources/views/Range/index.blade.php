@extends('layouts.app')
@section('content')
<div class="container">
  <a href="{{route('range.create')}}" class="btn btn-success">Add New Range</a><br><br>
  <table class="table table-light table-hover">
    <thead class="thead-light table-hover">
      <tr>
        <th>#</th>
        <th>ID Range</th>
        <th>Name</th>
        <th>Duration</th>
        <th>Start Date</th>
        <th>Final Date</th>
        <th>Actions</th>
      </tr>    
    </thead>
    <tbody>
    @foreach($ranges as $range)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$range->id}}</td>
        <td>{{$range->name}}</td>
        <td>{{$range->duration}}</td>
        <td>{{$range->start_date}}</td>
        <td>{{$range->final_date}}</td>
        <td>
          <a href="{{route ('range.edit',$range->id)}}" class="btn btn-warning">EDIT
            {{@method_field('PUT')}}
          </a>
          <form action="{{route ('range.destroy',$range->id)}}" method="post" style="display:inline">
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