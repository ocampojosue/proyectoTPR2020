@extends('layouts.app')
@section('content')
<div class="container">
  <div class="text-left">
    <a href="{{route('student.create')}}" class="btn btn-success">Add New Student</a><br><br>
  </div>
  <div class="row" style="font-size: 15px">
  @foreach($students as $student)
        <div class="col-sm-4" >
          <div class="card" style="width: 16rem;">
            <img  class="card-img-top mx-auto d-block" src="images/students/{{$student->avatar}}" alt="josue" style="width: 200px;height:200px;">
              <div class="card-body" style="padding: 0;margin:7px 0px">
                <h5 class="card-title text-center">{{$student->name}} {{$student->surname}}</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Sex: </strong>{{$student->sex}}</li> 
                  <li class="list-group-item mx-auto d-block">
                    <a href="{{route ('student.edit',$student->id)}}" style="" class="btn btn-warning">
                      Edit
                    </a>
                    <a href="{{route ('student.show',$student->id)}}" style="" class="btn btn-primary">
                      Show
                    </a>
                    <form action="{{route ('student.destroy',$student->id)}}" method="post" style="display:inline">
                      {{@csrf_field()}}
                      {{method_field('DELETE')}}
                      <button class="btn btn-danger" type="submit" onclick="return confirm('Confirm to Delete')">DELETE</button>
                    </form>
                  </li> 
                </ul>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last update: {{$student->updated_at}}</small>
              </div>
          </div><br><br>
        </div>
      @endforeach
  </div>
</div>
@endsection