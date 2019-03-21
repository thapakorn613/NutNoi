@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">select your time for Exam</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif
                    <table boarder="1">
                        @foreach($projectTable as $key => $data)
                        <tr>
                            <br>  
                            <td>{{$data->id}}</td>
                            <td>{{$data->project_name}}</td>
                            <td>{{$data->teacher_id1}}</td>
                            <td>{{$data->teacher_id2}}</td>
                            <td>{{$data->teacher_id3}}</td>
                                          
                        </tr>
                        @endforeach
                        </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
