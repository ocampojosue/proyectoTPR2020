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
                <div class="card-header">Add New Matter</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('matter.store')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="matter_name" class="col-md-4 col-form-label text-md-right">{{ __('Matter Name') }}</label>
                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="matter_name" value="{{ old('matter_name') }}">
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Matter') }}
                                </button>
                                <a href="{{route('matter.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection