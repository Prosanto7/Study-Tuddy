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
                                    <button type="submit" class="btn btn-danger fw-bold" name="rowId" value="{{$subject->id}}"><i class="fa fa-trash"></i></button>
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
                                    <input class="form-control" type="text" name="subjectName" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Enter subject name or course title">
                                    @error('subjectName')
                                        <span class="warning">{{$message}}</span>
                                    @enderror
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success fw-bold" name="addSubject">Add Subject</button>
                                </td>
                            </form>
                        </tr>
                </table>
            </div>
            
            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center" id="topicTable">
                        @php 
                            $i = 1;
                        @endphp
                            <tr>
                                <th>No</th>
                                <th>Subject or Course Title</th>
                                <th>Topics</th>
                                <th>Classes Required</th>
                                <th colspan="2">Action</th>
                            </tr>
                    <tbody>
                        @foreach ($subjects as $subject)
                            @php
                                $subjectName = $subject->subject
                            @endphp
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td id="{{$subjectName}}">
                                    {{$subject->subject}}
                                </td>
                                @foreach($subjectStatus as $subjectstat) 
                                    @if ($subjectstat->subject == $subject->subject) 
                                    <form action="{{url('updatetopic/'.$subjectName)}}" method="POST">
                                    @csrf
                                        <td>
                                            <input class="form-control" value="{{$subjectstat->topic}}" type="text" name="topicName" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Enter topic name" Required>
                                        </td>
                                        <td>
                                            <input class="form-control" value="{{$subjectstat->status}}" type="number" name="status" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Number of classes required" Required min="1">
                                        </td>
                                        <td>   
                                            <button type="submit" class="btn btn-warning fw-bold" name="rowId" value="{{$subjectstat->id}}"><i class="fa fa-upload"></i></button> 
                                        </td>
                                    </form>
                                        <td> 
                                            <form action="{{url('deletetopic')}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger fw-bold" name="rowId" value="{{$subjectstat->id}}"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td colspan="2">

                                        </td>
                                    @endif    
                                @endforeach
                                <form action="{{url('addtopic/'.$subjectName)}}" method="POST">
                                    @csrf
                                    <td>
                                        <input class="form-control" type="text" name="topicName" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Enter topic name" Required>
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" name="status" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Number of classes required" Required min="1">
                                    </td>
                                    <td colspan="2">
                                        <button type="submit" class="btn btn-success fw-bold" name="addTopic">Add Topic</button>
                                    </td>
                                    </tr>
                                </form>    
                        @endforeach
                    </tbody>
                </table>
            </div>
@stop