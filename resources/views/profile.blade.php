@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="span12">
                         <div class="centered service">
                                <div class="circle-border">
                                <a  class="brand">
                                    <img class="img-circle" src="images/user.png" alt="service 4">
                                </a>
                                </div>
                                
                                <h3>{{$user->name}}</h3>
                            
                            </div>
                        </div>
                <div class="card">
                
                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                   
                    <tr><th>Email</th>
                    <td>{{$user->email}}</td> 
                    <tr>
                        <th>Project ID</th> 
                        @if ( $user->project_id != NULL )
                            <td>{{$user->project_id}}</td> 
                        @else
                            <td>ยังไม่มีข้อมูลในระบบ</td>
                        @endif
                    <tr>
                        <th>Project Name</th> 
                        @if ( $project->project_name != NULL )
                            <td>{{$project->project_name}}</td> 
                        @else
                            <td>ยังไม่มีข้อมูลในระบบ</td>
                        @endif 
                    <tr>
                        <th>Booking</th>
                        @if ( $user->booking_id != NULL )
                            <td>{{$user->booking_id}}</td> 
                        @else
                            <td>ยังไม่ได้ถูก Confirm</td>
                        @endif
                    </tr>
                    </table>   
                    <table boarder="1">
                    <table class="table table-bordered table-striped">
                        @foreach( $booking as $time => $data)
                            <th>Booking ID</th>
                            <th>Date : Time</th>
                            <th>Project ID</th>
                            <tr>
                            <td>{{$data->booking_id}}</td>  
                            <td>{{$data->datetime}}</td>  
                            <td>{{$data->project_id}}</td>   
                        </tr>
                        @endforeach
                        @if ( $user->booking_id == NULL)
                            <tr><td>สถานะตอนนี้</td></tr>
                            <tr><td>ยังไม่ได้ถูก Confirm </td> </tr>
                        @endif
                    </table>
                    @if ($user->haveWaitTable != null && $user->booking != NULL)
                        <table class="table table-bordered table-striped">
                            <td>Order</td>
                            <th>Booking ID</th>
                            <td>Time</td>
                            <td>Issue</td>
                            <tr>
                            @for ($i = 0; $i < count($timebookingTable ); $i++)
                                @if ( $timebookingTable[$i]->project_id == $user->project_id)
                                    @if ($waitTable->booking_id1 == $timebookingTable[$i]->booking_id)
                                        <tr>
                                        <td>Booking ID 1</td>
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a class="btn btn-success" href="/home/table" >back to select time</a>
                                        </tr>
                                    @endif
                                    @if ($waitTable->booking_id2 == $timebookingTable[$i]->booking_id)
                                        <tr>
                                        <td>Booking ID 2</td>
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a class="btn btn-success" href="/home/table" >back to select time</a>
                                        </tr>
                                    @endif
                                    @if ($waitTable->booking_id3 == $timebookingTable[$i]->booking_id)
                                        <tr>
                                        <td>Booking ID 3</td>
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a class="btn btn-success" href="/home/table" >back to select time</a>
                                        </tr>
                                    @endif
                                @endif
                                </tr>
                            @endfor
                        </table>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
