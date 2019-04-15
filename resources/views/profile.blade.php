@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif
                    
                    <table class="table table-bordered table-striped">
                    <tr><th>first name</th>
                    <td>{{$user->name}}</td>  
                    <tr><th>Email</th>
                    <td>{{$user->email}}</td>  
                    <tr><th>Booking</th>
                    <td>{{$user->booking_id}}</td>               
                    
                    </tr>
                    </table>   
                    <table boarder="1">
                    <table class="table table-bordered table-striped">
                    <th>Booking ID</th>
                    <th>Date : Time</th>
                    <th>Project ID</th>
                    @foreach( $booking as $time => $data)
                        <tr>
                        <td>{{$data->booking_id}}</td>  
                        <td>{{$data->datetime}}</td>  
                        <td>{{$data->project_id}}</td>   
                    </tr>
                    @endforeach
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
