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
                    
                        @foreach($profile as $key => $data)
                        <tr>
                            <br>  
                            <td>{{$data->name}}</td>
                            <td>{{$data->surname}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->project_id}}</td>
                            
                                
                        </tr>
                        @endforeach
                       
                        <table boarder="1">
                        @foreach($booking as $key => $data)

                        <tr>
                            <br>  
                    
                            <td>{{$data->booking_id}}</td>
                            <td>{{$data->datetime}}</td>

                                
                        </tr>
                                        

                        @endforeach
</table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
