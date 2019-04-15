@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                    
               
                <table class="table table-bordered table-striped">
                        
                        <tr>
                        @for ($i = 0; $i < count($time); $i++)
                            @if ( $time[$i]->booking_id ==$booking->booking_id1)
                                <th>{{$booking->booking_id1}}</th>
                                <th>{{$time[$i]->datetime}}</th>
                                <th><a href="{{ action('UserController@edittime2',$i)}}" class="btn btn-danger">Edit</a></th>
                           @endif
                       
                        @endfor
                        </tr>
                        <tr>
                        @for ($i = 0; $i < count($time); $i++)
                            @if ( $time[$i]->booking_id == $booking->booking_id2)
                                <th>{{$booking->booking_id2}}</th>
                                <th>{{$time[$i]->datetime}}</th>
                                <th><a href="{{ action('UserController@edittime2',$i)}}" class="btn btn-danger">Edit</a></th>
                           @endif
                        
                       
                        @endfor
                        </tr>
                            <tr>
                        @for ($i = 0; $i < count($time); $i++)
                            @if ( $time[$i]->booking_id == $booking->booking_id3)
                                <th>{{$booking->booking_id3}}</th>
                                <th>{{$time[$i]->datetime}}</th>
                                <th><a href="{{ action('UserController@edittime2',$i)}}" class="btn btn-danger">Edit</a></th>
                           @endif
                     
                        @endfor
                      </tr>

</table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
