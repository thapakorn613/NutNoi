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
                    **** หน้านี้ควรจะเด้งเป็น ป็อบอัพให้กดแค่ ok แล้วปิด
                    +++++<br>
                        ตราบใดที่ยังไม่มีการ Confirm จาก Admin ก็ยังคงสามารถแก้ไขเวลาแล้วอันดับได้นะจ้ะ
                        อิอิ งุงิ คุคิ กรีน<br>
                    +++++
                    <br>
                    <td>
                        <a class="btn btn-success" href="/home/table" >back to show table page</a>
                    </td>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
