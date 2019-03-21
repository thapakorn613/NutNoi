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
                    <table class="table table-bordered table-striped">
                        <tr> 
                        <th>Booking ID </th>
                        <th>DateTime</th>
                        <th>Project ID</th>
                        <th>Add</th>
                        @foreach($timebookingTable as $key => $data)<tr>
                        
                            <br>  
                            <td>{{$data->booking_id}}</td>
                            <td>{{$data->datetime}}</td>
                            <td>{{$data->project_id}}</td>
                            <td><a href="{{ action('UserController@setBooking',$data->booking_id)}}" class="btn btn-primary">Add</a></td> 
                                  
                        </tr>
                        @endforeach
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
