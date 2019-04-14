@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ( $waitTable->status_confirm == '1')
                <div class="card">
                    <div class="card-header">ช่วงเวลาที่ Confirm ไว้ ณ ตอนนี้ </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                            <td>Project ID</td>
                            <td>Booking ID</td>
                            <td>Time</td>
                            </tr>
                            <tr>
                            <td>{{$users->project_id}}</td>
                            <td>{{$users->booking_id}}</td>
                            <td>{{$datatimeUser->datetime}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Select your time for examination</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        Project_id : {{$waitTable->project_id}}
                        <td>Booking ID</td>
                        <td>Time</td>
                        <td>Confirm here</td>

                        @for ($i = 0; $i < count($time); $i++)
                            @if ( $time[$i]->booking_id ==$waitTable->booking_id1)
                                <tr>
                                <td>{{$waitTable->booking_id1}}</td>
                                <td>{{$time[$i]->datetime}}</td>
                                @if ($users->booking_id == $waitTable->booking_id1)
                                <td><a class="btn btn-success" href="{{ action('AdminController@confirm',[$waitTable->booking_id1 , $waitTable->project_id])}}" >confirmed</a></td>
                                @else <td><a class="btn btn-primary" href="{{ action('AdminController@confirm',[$waitTable->booking_id1 , $waitTable->project_id])}}" >confirm</a></td>
                                @endif
                            @endif
                        @endfor
                        @for ($i = 0; $i < count($time); $i++)
                            @if ( $time[$i]->booking_id == $waitTable->booking_id2)
                                <tr>
                                <td>{{$waitTable->booking_id2}}</td>
                                <td>{{$time[$i]->datetime}}</td>
                                @if ($users->booking_id == $waitTable->booking_id2)
                                <td><a class="btn btn-success" href="{{ action('AdminController@confirm',[$waitTable->booking_id2 , $waitTable->project_id])}}" >confirmed</a></td>
                                @else <td><a class="btn btn-primary" href="{{ action('AdminController@confirm',[$waitTable->booking_id2 , $waitTable->project_id])}}" >confirm</a></td>
                                @endif
                            @endif
                        @endfor
                        @for ($i = 0; $i < count($time); $i++)
                            @if ( $time[$i]->booking_id == $waitTable->booking_id3)
                                <tr>
                                <td>{{$waitTable->booking_id3}}</td>
                                <td>{{$time[$i]->datetime}}</td>
                                @if ($users->booking_id == $waitTable->booking_id3)
                                <td><a class="btn btn-success" href="{{ action('AdminController@confirm',[$waitTable->booking_id3 , $waitTable->project_id])}}" >confirmed</a></td>
                                @else <td><a class="btn btn-primary" href="{{ action('AdminController@confirm',[$waitTable->booking_id3 , $waitTable->project_id])}}" >confirm</a></td>
                                @endif
                            @endif
                        @endfor
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
