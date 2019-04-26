@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  
            <div class="card">
                <div class="card-header">Successful !!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    
                    @endif
                    Your time has been selected, Please check on your profile.
                    <table class="table table-bordered table-striped">
                        <tr>
                        <td> name </td>
                        <td> email </td>
                        <td> status </td>
                        </tr>
                    
                        <tr>
                        <td> {{$users->name}} </td>
                        <td> {{$users->email}} </td>
                        @if ($project->send_email == NULL)
                            <td> ยังไม่ได้ส่ง </td>
                        @else 
                            <td> ส่งแล้ว </td>
                        @endif
                        </tr>

                        <tr>
                        <td> {{$teacher1->name}} </td>
                        <td> {{$teacher1->email}} </td>
                        @if ($project->send_email == NULL)
                            <td> ยังไม่ได้ส่ง </td>
                        @else 
                            <td> ส่งแล้ว </td>
                        @endif
                        </tr>

                        <tr>
                        <td> {{$teacher2->name}} </td>
                        <td> {{$teacher2->email}} </td>
                        @if ($project->send_email == NULL)
                            <td> ยังไม่ได้ส่ง </td>
                        @else 
                            <td> ส่งแล้ว </td>
                        @endif
                        </tr>

                        <tr>
                        <td> {{$teacher3->name}} </td>
                        <td> {{$teacher3->email}} </td>
                        @if ($project->send_email == NULL)
                            <td> ยังไม่ได้ส่ง </td>
                        @else 
                            <td> ส่งแล้ว </td>
                        @endif
                        </tr>

                        <tr>
                        <td> ++ </td>
                        <td> 
                            <a class="btn btn-success" href="{{ action('AdminController@send_email')}}" >Send Email</a> </td>
                           
                        <td> ++ </td>
                        </tr>
                    </table>
                    <br>
                    <td>
                        <a class="btn btn-primary" href="/manager" >back to Manager</a>
                    </td>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
