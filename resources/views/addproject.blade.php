@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <form method="POST" action="{{action('UserController@addproject_db' )}}">
    @csrf

    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Project_Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



        <label for="name" class="col-md-2 col-form-label text-md-center">{{ __('  Doctor 1  ') }}</label>
        <div class="col-md-4">
            <select  id="teacher1" class="form-control{{ $errors->has('doctor') ? ' is-invalid' : '' }}" name="teacher1"  required autofocus>
            @for ($i = 0; $i < count($teacher); $i++)
                    <option value='{{$teacher[$i]->id}}'>{{$teacher[$i]->name}}</option>
                   
            @endfor
            </select>
            @if ($errors->has('doctor'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('doctor') }}</strong>
                </span>
            @endif
        </div>
        <label for="name" class="col-md-2 col-form-label text-md-center">{{ __('  Doctor 2  ') }}</label>
        <div class="col-md-4">
            <select  id="teacher2" class="form-control{{ $errors->has('doctor') ? ' is-invalid' : '' }}" name="teacher2"  required autofocus>
            @for ($i = 0; $i < count($teacher); $i++)
                    <option value='{{$teacher[$i]->id}}'>{{$teacher[$i]->name}}</option>
                   
            @endfor
            </select>
            @if ($errors->has('doctor'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('doctor') }}</strong>
                </span>
            @endif
        </div>
        <label for="name" class="col-md-2 col-form-label text-md-center">{{ __('  Doctor 3  ') }}</label>
        <div class="col-md-4">
            <select  id="teacher3" class="form-control{{ $errors->has('doctor') ? ' is-invalid' : '' }}" name="teacher3"  required autofocus>
            @for ($i = 0; $i < count($teacher); $i++)
                    <option value='{{$teacher[$i]->id}}'>{{$teacher[$i]->name}}</option>
                   
            @endfor
            </select>
            @if ($errors->has('doctor'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('doctor') }}</strong>
                </span>
            @endif
        </div>
           <br>
        <div class="form-group row mb-center">
                <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('update') }}
                        </button>
                </div>
        </div>
    </form>
</div>

@stop