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
                        <th>wait id</th>
                        <th>Project ID1</th>
                        <th>Project ID2</th>
                        <th>Project ID3</th>
                        <th>Add</th>
                        <tr>
                       
                            <td>{{$waitTable->wait_id}}</td>
                            <td>{{$waitTable->booking_id1}}</td>
                            <td>{{$waitTable->booking_id2}}</td>
                            <td>{{$waitTable->booking_id3}}</td>
                            <td><a href="" class="btn btn-primary">Confirm</a></td>
                        </tr>
                    
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
