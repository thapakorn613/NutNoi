@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mask" id="service">
                <div class="container">
                    <div class="row-fluid">
                    @if ($users->project_id != NULL && $users->booking_id == NULL)
                        <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                <a href="{{ action('UserController@firstAddBooking')}}" class="brand"><img class="img-circle" src="images/note.png" alt="service 1">
                                </a>
                                </div>
                            <h3>จองคิว</h3>
                             
                            </div>
                        </div>
                        <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                <a href="/profile" class="brand">
                                    <img class="img-circle" src="images/file.png" alt="service 2">
                                </a>
                                </div>
                                <h3>โปรไฟล์</h3>
                            
                            </div>
                        </div>
                        <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                <a href="/table" class="brand">
                                     <img class="img-circle"   src="images/archive.png" alt="service 3">
                                </a>
                                </div>
                                <h3>แสดงการจองเวลา</h3>
                            
                            </div>
                        </div>
                    @elseif ($users->project_id != NULL && $users->booking_id != NULL)
                  
                        <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                    <img class="img-circle" src="images/note.png" alt="service 4">
                                </div>
                                <h3>โปรไฟล์</h3>
                            
                            </div>
                        </div>
                        <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                    <img class="img-circle" src="images/note.png" alt="service 4">
                                </div>
                                <h3>โปรไฟล์</h3>
                            
                            </div>
                        </div>
                       
                        <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                    <img class="img-circle" src="images/note.png" alt="service 4">
                                </div>
                                <h3>โปรไฟล์</h3>
                            
                            </div>
                        </div>
                    @elseif ($users->type == "admin")
                    <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                <a href="/manager" class="brand">
                                    <img class="img-circle" src="images/note.png" alt="service 4">

                                </a></div>
                                <h3>จัดการ</h3>
                            
                            </div>
                        </div>
                    <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                <a href="/showproject" class="brand">
                                    <img class="img-circle" src="images/file.png" alt="service 4">
                                </a>
                                </div>
                                <h3>รายการ</h3>
                            
                            </div>
                        </div>
                        <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                <a href="/addproject" class="brand">
                                    <img class="img-circle" src="images/diskette.png" alt="service 4">
                                </a>
                                </div>
                                <h3>เพิ่มโปรเจค</h3>
                            
                            </div>
                        </div>
                    @else
                    
                        <div class="span6">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                
                                    <img class="img-circle" src="images/busy.png" alt="service 4">
                                
                                </div>
                                <h3>รอการดำเนินการ</h3>
                            
                            </div>
                        </div>
                        
                        <div class="span6">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                <a href="{{ action('UserController@addproject_db')}}" class="brand">
                                    <img class="img-circle" src="images/diskette.png" alt="service 4">
                                </a>
                                </div>
                                <h3>เพิ่มโปรเจค</h3>
                            
                            </div>
                        </div>
                        <div class="span4"></div>
                                
                        
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
