@extends('layouts.app')
@section('content')
<div class="container">
  <div class="text-left">
    <a href="{{route('teacher.create')}}" class="btn btn-success">Add New Teacher</a><br><br>
  </div>
  <div class="row" style="font-size: 15px">
  @foreach($teachers as $teacher)
        <div class="col-sm-4" >
          <div class="card" style="width: 16rem;">
            <img  class="card-img-top mx-auto d-block" src="images/{{$teacher->avatar}}" alt="" style="width: 200px;height:200px;">
              <div class="card-body" style="padding: 0;margin:7px 0px">
                <h5 class="card-title text-center">{{$teacher->name}} {{$teacher->lastname}}</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Address: </strong>{{$teacher->address}}</li>
                  <li class="list-group-item"><strong>Matter: </strong>{{$teacher->matter}}</li>
                  <li class="list-group-item"><strong>City: </strong>{{$teacher->city}}</li>
                  <li class="list-group-item"><strong>Phone: </strong>{{$teacher->phone}}</li>
                  <li class="list-group-item"><strong>Sex: </strong>{{$teacher->sex}}</li> 
                  <li class="list-group-item">
                    <a href="{{route ('teacher.show',$teacher->id)}}" style="" class="btn btn-primary mx-auto d-block">
                      Show More...
                    </a>
                  </li> 
                </ul>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last update: {{$teacher->updated_at}}</small>
              </div>
          </div><br><br>
        </div>
      @endforeach
  </div>
</div>
@endsection