@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        <th>Project ID</th>
                        <th>Add</th>
                        <tr>
                        @for ($i = 0; $i < count($timebookingTable ); $i++)
                            @if ( $timebookingTable[$i]->project_id == $id)
                                <td>{{$timebookingTable[$i]->datetime}}</td>
                                <td>{{$timebookingTable[$i]->project_id}}</td>
                                <td><a href="{{ action('UserController@setBooking',$timebookingTable[$i]->booking_id)}}" class="btn btn-danger">Add</a></td>
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
