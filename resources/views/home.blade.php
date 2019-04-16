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
                    welcome to The hell
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Menu and Function</div>
                <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                    <td> Program </td>
                    <td> Function </td>
                    </tr>
                    <tr><td>การเพิ่มการจองคิว</td>
                    <td><a class="btn btn-success" href="/home/table" >จอง</a></td>  </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
