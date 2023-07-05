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
                <th>Action</th>
            </tr>
            @foreach ($classes as $class)
            <tr>
                <td>
                    {{$i++}}
                </td>

                <td>
                    {{$class->class_name}}
                </td>
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
                    <td>
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
                <th colspan="2">Action</th>
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
                            <button type="submit" class="btn btn-warning fw-bold" name="rowId" value="{{$subject->id}}"><i class="fa fa-upload"></i></button>
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
                    <form action="{{url('addAdminSubject')}}" method="POST">
                        @csrf
                        <td>
                            <input class="form-control" type="text" name="subjectName" style="height:100%; margin-top: 0%; margin-bottom: 0%;" placeholder="Enter subject name" Required>
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