@extends('layouts.app')
@section('content')
<div class="container">
  <a href="{{route('matter.create')}}" class="btn btn-success">Add New Matter</a><br><br>
  <label for="">Students of matter</label>
  <table class="table table-light table-hover">
    <thead class="thead-light table-hover">
      <tr>
        <th>ID Student</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Sex</th>
      </tr>    
    </thead>
    <tbody>
    @foreach($matters as $matter)
      <tr>
        <td>{{$matter->id}}</td>
        <td>{{$matter->name}}</td>
        <td>{{$matter->surname}}</td>
        <td>{{$matter->sex}}</td>
      </tr>
      @endforeach
    </tbody> 
  </table>
</div>
@endsection