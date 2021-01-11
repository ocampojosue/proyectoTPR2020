@extends('layouts.app')
@section('content')
<div class="container">
  <a href="{{route('course.create')}}" class="btn btn-success">Add New Course</a><br><br>
  <table class="table table-light table-hover">
    <thead class="thead-light table-hover">
      <tr>
        <th>#</th>
        <th>ID Course</th>
        <th>Name</th>
        <th>Description</th>
        <th>Period</th>
        <th>Actions</th>
      </tr>    
    </thead>
    <tbody>
    @foreach($courses as $course)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$course->id}}</td>
        <td>{{$course->name}}</td>
        <td>{{$course->description}}</td>
        <td>{{$course->period_id}}</td>
        <td>
          <a href="{{route ('course.edit',$course->id)}}" class="btn btn-warning">EDIT
            {{@method_field('PUT')}}
          </a>
          <form action="{{route ('course.destroy',$course->id)}}" method="post" style="display:inline">
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