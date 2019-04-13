@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <tr> 
                        <th>Project ID</th>
                        <th>Status</th>
                        <th>Check</th>
                        <tr>
                        @for ($i = 0; $i < count( $waitTable ); $i++)
                            <td>{{$waitTable[$i]->project_id}}</td>
                            @if ($waitTable[$i]->status_confirm == null)
                                <td> Not Confirm </td>
                                <td><a href="{{ action('AdminController@toCheck',$waitTable[$i]->project_id)}}" class="btn btn-primary" >Check</a></td>
                            @elseif ($waitTable[$i]->status_confirm == "1")
                                <td> Confirm </td>
                                <td><a href="/home" class="btn btn-primary" >Edit</a></td> 
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
