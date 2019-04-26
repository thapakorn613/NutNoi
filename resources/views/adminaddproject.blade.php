@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{action('AdminController@addproject_db' )}}">
    @csrf
        <div class="col-md-8">
            <div class="card">
                <div class="card-body ">
                <div class="col-md-4">
                    <br><br>
                    <center>
                    <div class="alert alert-success" role="alert">
                       <h2> เลือกนักศึกษาที่ยังไม่มีโปรเจค</h2>
                    </div>
                    <select  id="users" class="form-control{{ $errors->has('users') ? ' is-invalid' : '' }}" name="users"  required autofocus>
                        @for ($i = 0; $i < count($users); $i++)
                            @if($users[$i]->project_id == null && $users[$i]->type == null )
                                <option value='{{$users[$i]->id}}'>{{$users[$i]->id}} {{$users[$i]->name}}</option>
                            @endif   
                        @endfor
                    </select>
                    <div class="alert alert-primary" role="alert">
                        <h4>เลือกโปรเจคในกับนักศึกษา</h4>
                    </div>
                    <select  id="project" class="form-control{{ $errors->has('project') ? ' is-invalid' : '' }}" name="project"  required autofocus>
                    @for ($i = 0; $i < count($project); $i++)
                        @for ($j = 0; $j < count($users)+1; $j++)
                            @if($j == count($users))
                                <option value='{{$project[$i]->id}}'>{{$project[$i]->id}} {{$project[$i]->project_name}}</option>
                                @break
                            @endif

                            @if($project[$i]->id == $users[$j]->project_id)
                            @break
                            @endif     
                        
                        @endfor
                    @endfor
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success">
                        {{ __('update') }}
                    </button>
                    </center>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
