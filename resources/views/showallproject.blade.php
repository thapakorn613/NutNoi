@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
            <div class="card">
                <div class="card-header">ALL Project</div>

                <div class="card-body">
                  
                    <table class="table table-bordered table-striped">
                        <tr> 
                        <th>project_id</th>
                        <th>project_name</th>
                        <th>student</th>
                        <th>Teacher 1</th>
                        <th>Teacher 2</th>
                        <th>Teacher 3</th>
                        <tr>
                        
                        @for ($i = 0; $i < count($project ); $i++)
                        

                        <th>{{$project[$i]->id}}</th>
                        <th>{{$project[$i]->project_name}}</th>



                        @for ($j = 0; $j < count($user)+1; $j++)
                        @if ( $j == count($user))
                        <th> </th>
                        @elseif ( $user[$j]->project_id == $project[$i]->id)
                        <th>{{$user[$j]->name}}</th>
                        @break
                        @endif
                        @endfor

                        @for ($j = 0; $j < count($teacher)+1; $j++)
                        @if ( $j == count($teacher))
                        <th> </th>
                        @elseif ( $teacher[$j]->id == $project[$i]->teacher_id1)
                        <th>{{$teacher[$j]->name}}</th>
                        @break
                        @endif
                        @endfor

                        @for ($j = 0; $j < count($teacher)+1; $j++)
                        @if ( $j == count($teacher))
                        <th> </th>
                        @elseif ( $teacher[$j]->id == $project[$i]->teacher_id2)
                        <th>{{$teacher[$j]->name}}</th>
                        @break
                        @endif
                        @endfor

                        @for ($j = 0; $j < count($teacher)+1; $j++)
                        @if ( $j == count($teacher))
                        <th> </th>
                        @elseif ( $teacher[$j]->id == $project[$i]->teacher_id3)
                        <th>{{$teacher[$j]->name}}</th>
                        @break
                        @endif
                        @endfor


                       



                                
                               
                          
                        </tr>
                        @endfor





                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
