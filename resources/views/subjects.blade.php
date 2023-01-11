@extends('layouts.app')

@section('content')

            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center">
                    @php 
                        $i = 1;
                    @endphp
                        <tr>
                            <th>No</th>
                            <th>Subject or Course Title</th>
                            <th>Action</th>
                        </tr>
                    @foreach ($subjects as $subject) 
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                       
                            <td>
                                {{$subject->subject}}
                            </td>
                            <td>
                                <form action="{{url('deletesubject')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger fw-bold" name="rowId" value="{{$subject->id}}">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <form action="{{url('addsubject')}}" method="POST">
                            @csrf
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="subjectName" style="height:100%; margin-top: 0%; margin-bottom: 0%;">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success fw-bold" name="addSubject">Add Subject</button>
                                </td>
                            </form>
                        </tr>
                </table>
            </div>
            
            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center">
                        @php 
                            $i = 1;
                        @endphp
                            <tr>
                                <th>No</th>
                                <th>Subject or Course Title</th>
                                <th>Topics</th>
                                <th>Status</th>
                                <th>Total Percantage</th>
                            </tr>
                    <tbody>
                        @foreach ($subjectStatus as $subjectstat)
                            @foreach($subjects as $subject) 
                            
                            @endforeach
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                        
                                <td>
                                    {{$subjectstat->subject}}
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@stop