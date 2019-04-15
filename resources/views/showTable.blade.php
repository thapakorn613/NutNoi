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
                        @if ( $users->booking_id != NULL )
                            <td>{{$users->booking_id}}</td> 
                        @else
                            <td>ยังไม่ได้ถูก Confirm</td>
                        @endif
                        <td>{{$users->project_id}}</td>
                        </tr>
                    </table>  
                    <table class="table table-bordered table-striped">
                        <td>Order</td>
                        <th>Booking ID</th>
                        <td>Time</td>
                        <td>Move</td>
                        <tr>
                        @for ($i = 0; $i < count($timebookingTable ); $i++)
                            @if ( $timebookingTable[$i]->project_id == $id)
                                @if ($waitTable->booking_id1 == $timebookingTable[$i]->booking_id)
                                    <tr>
                                    <td>Booking ID 1</td>
                                    <td>{{$timebookingTable[$i]->booking_id}}</td>
                                    <td>{{$timebookingTable[$i]->datetime}}</td>
                                    <td><a class="btn btn-success" href="#" >up</a>
                                    <a class="btn btn-orange" href="#" >down</a>
                                    <a class="btn btn-red" href="#" >delete</a></td>
                                    </tr>
                                @endif
                                @if ($waitTable->booking_id2 == $timebookingTable[$i]->booking_id)
                                    <tr>
                                    <td>Booking ID 2</td>
                                    <td>{{$timebookingTable[$i]->booking_id}}</td>
                                    <td>{{$timebookingTable[$i]->datetime}}</td>
                                    <td><a class="btn btn-success" href="#" >up</a>
                                    <a class="btn btn-orange" href="#" >down</a>
                                    <a class="btn btn-red" href="#" >delete</a></td>
                                    </tr>
                                @endif
                                @if ($waitTable->booking_id3 == $timebookingTable[$i]->booking_id)
                                    <tr>
                                    <td>Booking ID 3</td>
                                    <td>{{$timebookingTable[$i]->booking_id}}</td>
                                    <td>{{$timebookingTable[$i]->datetime}}</td>
                                    <td><a class="btn btn-success" href="#" >up</a>
                                    <a class="btn btn-orange" href="#" >down</a>
                                    <a class="btn btn-red" href="#" >delete</a></td>
                                    </tr>
                                @endif
                            @endif
                            </tr>
                        @endfor
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
                        <th>Booking ID</th>
                        <th>Date Time</th>
                        <th>Add</th>
                        <tr>
                        @for ($i = 0; $i < count($timebookingTable ); $i++)
                            @if ( $timebookingTable[$i]->project_id == $id && $timebookingTable[$i]->booking_id != $waitTable->booking_id1 && $timebookingTable[$i]->booking_id!= $waitTable->booking_id2&& $timebookingTable[$i]->booking_id!= $waitTable->booking_id3 )
                                    <td>{{$timebookingTable[$i]->booking_id}}</td>
                                    <td>{{$timebookingTable[$i]->datetime}}</td>
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
