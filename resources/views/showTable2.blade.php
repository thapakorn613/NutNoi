@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ข้อมูลโปรเจคคร่าวๆของ {{$users->name}}</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr> 
                        <th>Name Project</th>
                        <th>Booking ID</th>
                        <th>Project ID</th>
                        <tr>
                        <td>{{$project->project_name}}</td>
                        <td>{{$users->booking_id}}</td>
                        <td>{{$users->project_id}}</td>
                        </tr>
                    </table>   
                </div>
            </div>
            <div class="card">
                <div class="card-header">Select your time for examination</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <tr> 
                        <th>Date Time</th>
                        <th>Booking ID</th>
                        <th>Add</th>
                        <tr>
                        @for ($i = 0; $i < count($timebookingTable ); $i++)
                            @if ( $timebookingTable[$i]->project_id == $id)
                                <td>{{$timebookingTable[$i]->datetime}}</td>
                                <td>{{$timebookingTable[$i]->booking_id}}</td>
                                <td><a href="{{ action('UserController@setBooking2',[$timebookingTable[$i]->booking_id , $id2])}}" class="btn btn-danger">Add</a></td>
                           @endif
                        </tr>
                        @endfor
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
