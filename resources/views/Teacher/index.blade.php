@extends('layouts.app')
@section('content')
<div class="row">
  <div class="container"> 
    <a href="{{route('teacher.create')}}" class="btn btn-success">Add New Teacher</a><br><br>
    @foreach($teachers as $teacher)
      <div class="col-sm">
        <div class="card" style="width: 18rem; margin-top: 70px;">
          <img  class="card-img-top mx-auto d-block" src="images/{{$teacher->avatar}}" alt="">
            <div class="card-body">
              <h5 class="card-title text-center">{{$teacher->name}} {{$teacher->lastname}}</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Address: </strong>{{$teacher->address}}</li>
                <li class="list-group-item"><strong>Matter: </strong>{{$teacher->matter}}</li>
                <li class="list-group-item"><strong>City: </strong>{{$teacher->city}}</li>
                <li class="list-group-item"><strong>Phone: </strong>{{$teacher->phone}}</li>
                <li class="list-group-item"><strong>Sex: </strong>{{$teacher->sex}}</li> 
              </ul>
              <a href="{{route ('teacher.show',$teacher->id)}}" style="margin: 10px;" class="btn btn-primary mx-auto d-block">Show More...</a>
            </div>
            <div class="card-footer">git init
              <small class="text-muted">Last update: {{$teacher->updated_at}}</small>
            </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection