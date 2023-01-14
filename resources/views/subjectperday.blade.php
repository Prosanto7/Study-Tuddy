@extends('layouts.app')

@section('content')
            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <!-- <th colspan="3">
                            <h2 class="text-center fw-bold">Subjects Per Day</h2>
                        </th> -->
                    </tr>
                    <tr>
                        <th>Day</th>
                        <th>Number of Maximum Subjects</th>
                        <!-- <th>Action</th> -->
                    </tr>
                    <tbody>
                        <form action="{{url('updatesubjectsperday')}}" method="POST">
                        @csrf
                            <tr>
                                <td>
                                    Saturday
                                </td>
                                <td>
                                    <select class="form-select text-center" aria-label="Default select example" name="saturdayValue">
                                        <option selected>{{$subjectsPerDay['saturday']}}</option>
                                            @for ($i = 1; $i <= 10; $i++) 
                                                @if ($i != $subjectsPerDay['saturday']) 
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif    
                                            @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Sunday
                                </td>
                                <td>
                                    <select class="form-select text-center" aria-label="Default select example" name="sundayValue">
                                        <option selected>{{$subjectsPerDay['sunday']}}</option>
                                            @for ($i = 1; $i <= 10; $i++) 
                                                @if ($i != $subjectsPerDay['sunday']) 
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif    
                                            @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Monday
                                </td>
                                <td>
                                    <select class="form-select text-center" aria-label="Default select example" name="mondayValue">
                                        <option selected>{{$subjectsPerDay['monday']}}</option>
                                            @for ($i = 1; $i <= 10; $i++) 
                                                @if ($i != $subjectsPerDay['monday']) 
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif    
                                            @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tuesday
                                </td>
                                <td>
                                    <select class="form-select text-center" aria-label="Default select example" name="tuesdayValue">
                                        <option selected>{{$subjectsPerDay['tuesday']}}</option>
                                            @for ($i = 1; $i <= 10; $i++) 
                                                @if ($i != $subjectsPerDay['tuesday']) 
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif    
                                            @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Wednesday
                                </td>
                                <td>
                                    <select class="form-select text-center" aria-label="Default select example" name="wednesdayValue">
                                        <option selected>{{$subjectsPerDay['wednesday']}}</option>
                                            @for ($i = 1; $i <= 10; $i++) 
                                                @if ($i != $subjectsPerDay['wednesday']) 
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif    
                                            @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Thursday
                                </td>
                                <td>
                                    <select class="form-select text-center" aria-label="Default select example" name="thursdayValue">
                                        <option selected>{{$subjectsPerDay['thursday']}}</option>
                                            @for ($i = 1; $i <= 10; $i++) 
                                                @if ($i != $subjectsPerDay['thursday']) 
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif    
                                            @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Friday
                                </td>
                                <td>
                                    <select class="form-select text-center" aria-label="Default select example" name="fridayValue">
                                        <option selected>{{$subjectsPerDay['friday']}}</option>
                                            @for ($i = 1; $i <= 10; $i++) 
                                                @if ($i != $subjectsPerDay['friday']) 
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif    
                                            @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" style="width:100%;" class="btn btn-warning fw-bold">Update</button>
                                </td>
                            </tr>
                        </form>    
                    </tbody>
                </table>
            </div>
@stop