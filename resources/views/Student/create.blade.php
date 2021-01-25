@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('message'))
            <div class="alert alert success">
                <h3></h3>
            </div>
        @endif
        @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>                    
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">       
            <div class="card">
                <div class="card-header">Add New Student</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('student.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Sur Name') }}</label>
                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="surname" value="{{ old('surname') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <label for="male" class="col-md-10 col-form-label text-md-right">{{ __('Male') }}</label>
                                    <input id="" type="radio"  name="sex" value="male"><br>
                                    <label for="female" class="col-md-10 col-form-label text-md-right">{{ __('Female') }}</label>
                                    <input id="" type="radio"  name="sex" value="female"><br>
                                    <label for="nobinary" class="col-md-10 col-form-label text-md-right">{{ __('No Binary') }}</label>
                                    <input id="" type="radio"  name="sex" value="nobinary"><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Matter') }}</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    @foreach ($matters as $matter)
                                        <label class="mr-2">
                                            <input type="checkbox" name="matters" id="" value="{{$matter->id}}">
                                            {{$matter->matter_name}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
                                <input id="" type="file" class="form-control" name="avatar" value="{{ old('avatar') }}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Students') }}
                                </button>
                                <a href="{{route('student.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection