@extends('layouts.app')
@section('content')
<div class="container">
  <a href="{{route('period.create')}}" class="btn btn-success">Add New Period</a><br><br>
  <table class="table table-light table-hover">
    <thead class="thead-light table-hover">
      <tr>
        <th>#</th>
        <th>ID Period</th>
        <th>Name</th>
        <th>Duration</th>
        <th>Year</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>    
    </thead>
    <tbody>
    @foreach($periods as $period)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$period->id}}</td>
        <td>{{$period->name}}</td>
        <td>{{$period->duration}}</td>
        <td>{{$period->year}}</td>
        <td>{{$period->description}}</td>
        <td>
          <a href="{{route ('period.edit',$period->id)}}" class="btn btn-warning">EDIT
            {{@method_field('PUT')}}
          </a>
          <form action="{{route ('period.destroy',$period->id)}}" method="post" style="display:inline">
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