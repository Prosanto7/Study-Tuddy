@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <table class="table table-bordered table-hover text-center">
            @php
            $i = 1;
            @endphp
            <tr>
                <th>No</th>
                <th>Name of the class</th>
                <th>Update</th>
                <th>Delete Class</th>
            </tr>
            @foreach ($classes as $class)
            <tr>
                <td>
                    {{$i++}}
                </td>

                <form action="{{url('updateclass')}}" method="POST">
                    @csrf
                    <td>
                        <input class="form-control" type="text" name="className" value="{{$class->class_name}}" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Enter name of the class">
                        @error('className')
                        <span class="warning">{{$message}}</span>
                        @enderror
                    </td>
                    <td>
                        <button type="submit" class="btn btn-warning fw-bold" name="rowId" value="{{$class->id}}"><i class="fa fa-pencil fa-fw"></i></button>
                    </td>
                </form>
                <td>
                    <form action="{{url('deleteclass')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger fw-bold" name="rowId" value="{{$class->id}}"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <form action="{{url('addclass')}}" method="POST">
                    @csrf
                    <td>
                        {{$i++}}
                    </td>
                    <td>
                        <input class="form-control" type="text" name="className" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Enter name of the class">
                        @error('className')
                        <span class="warning">{{$message}}</span>
                        @enderror
                    </td>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success fw-bold" name="addClass">Add Class</button>
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
                <th>Class Name</th>
                <th>Subjects</th>
                <th>Update</th>
                <th colspan="2">Resource</th>
                <th>Update</th>
                <th colspan="2">Delete Subject</th>
            </tr>
            <tbody>
                @foreach ($classes as $class)
                <tr>
                    <td>
                        {{$i++}}
                    </td>
                    <td id="{{$class->id}}">
                        {{$class->class_name}}
                    </td>
                    @foreach($subjects as $subject)
                    @if ($subject->class_id == $class->id)
                    <form action="{{url('updateAdminSubject/'.$class->id)}}" method="POST">
                        @csrf
                        <td>
                            <input class="form-control" value="{{$subject->subject_name}}" type="text" name="subjectName" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Enter subject name" Required>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-warning fw-bold" name="rowId" value="{{$subject->id}}"><i class="fa fa-pencil fa-fw"></i></button>
                        </td>
                    </form>

                    <form enctype="multipart/form-data" action="{{url('updateAdminSubjectFile/'.$class->id)}}" method="POST">
                        @csrf
                        <td>
                            <input class="form-control" type="file" name="resourceFile" style="height:100%; margin-top: 0%; margin-bottom: 0%; max-width:250px;" placeholder="Enter upload your file">
                        </td>
                        <td>
                            @if ($subject->file_name != "")
                                <a class="btn btn-primary" target="_blank" href="{{url('openPDF/'.$subject->file_name)}}">PDF</a>
                            @endif    
                        </td>
                        <td>
                            <button type="submit" class="btn btn-warning fw-bold" name="rowId" value="{{$subject->id}}"><i class="fa fa-pencil fa-fw"></i></button>
                        </td>
                    </form>
                    <td>
                        <form action="{{url('deleteAdminSubject/'.$class->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger fw-bold" name="rowId" value="{{$subject->id}}"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">

                    </td>
                    @endif
                    @endforeach
                    <form enctype="multipart/form-data" action="{{url('addAdminSubject')}}" method="POST">
                        @csrf
                        <td>
                            <input class="form-control" type="text" name="subjectName" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Enter subject name" Required>
                        </td>
                        <td></td>
                        <td colspan="3">
                            <input class="form-control" type="file" name="resourceFile" style="height:100%; margin-top: 0%; margin-bottom: 0%; max-width:350px;" placeholder="Enter upload your file" Required>
                        </td>
                        <td colspan="2">
                            <button type="submit" class="btn btn-success fw-bold" name="classId" value="{{$class->id}}">Add Subject</button>
                        </td>
                </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
@stop