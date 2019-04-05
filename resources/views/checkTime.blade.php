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
                        
                       
                        <td>Project_id</td><td>{{$waitTable->project_id}}</td>

                        @for ($i = 0; $i < count($time); $i++)
                        @if ( $time[$i]->booking_id ==$waitTable->booking_id1)
                        <tr><td>{{$waitTable->booking_id1}}</td><td>{{$time[$i]->datetime}}</td>
                        <td><a href="{{ action('AdminController@ok',[$waitTable->booking_id1 , $waitTable->project_id])}}" class="btn btn-primary">confirm</a></td>
                        @endif
                        @endfor

                        @for ($i = 0; $i < count($time); $i++)
                        @if ( $time[$i]->booking_id ==$waitTable->booking_id2)
                        <tr><td>{{$waitTable->booking_id2}}</td><td>{{$time[$i]->datetime}}</td>
                        <td><a href="{{ action('AdminController@ok',[$waitTable->booking_id2 , $waitTable->project_id])}}" class="btn btn-primary">confirm</a></td>
                        @endif
                        @endfor

                        @for ($i = 0; $i < count($time); $i++)
                        @if ( $time[$i]->booking_id ==$waitTable->booking_id3)
                        <tr><td>{{$waitTable->booking_id3}}</td><td>{{$time[$i]->datetime}}</td>
                        <td><a href="{{ action('AdminController@ok',[$waitTable->booking_id3 , $waitTable->project_id])}}" class="btn btn-primary">confirm</a></td>
                        @endif
                        @endfor



                       

                         
                        
                    
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
