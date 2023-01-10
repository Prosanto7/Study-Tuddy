@extends('layouts.app')

@section('content')
            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th colspan="8">
                            <h2 class="text-center fw-bold">Time Slots</h2>
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Start</th>                        
                        <th>End</th>                   
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        @php 
                            $i = 1;
                            $lastID = 0;
                        @endphp

                        @foreach($timeSlots as $timeSlot) 
                            <tr>
                                <td>
                                    {{$i++}} 
                                </td>
                                <td>
                                    {{date('h:i:s A', strtotime($timeSlot->start))}}
                                </td>
                                <td>
                                    {{date('h:i:s A', strtotime($timeSlot->end))}}
                                </td>
                                <td>
                                    @php
                                        $duration = (strtotime($timeSlot->end) - strtotime($timeSlot->start)) / 60;
                                        if ($duration >= 60) {
                                            echo (int)($duration / 60)." hour " . ($duration % 60) . " minutes";
                                        } else {
                                            echo $duration." minutes";
                                        }
                                        $lastID = $timeSlot->id;
                                    @endphp
                                </td>
                                <td>
                                    <form action="{{url('deletetimeslot')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger fw-bold" name="rowId" value="{{$timeSlot->id}}">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <form action="addtimeslot" method="POST">
                                @csrf
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td>
                                        <input class="form-control" type="time" name="start" style="height:100%;">
                                    </td>
                                    <td>
                                        <input class="form-control" type="time" name="end" style="height:100%;">
                                    </td>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-success fw-bold" name="addTime" value="{{$lastID}}">Add Time Slot</button>
                                    </td>
                                </form>
                            </tr>
                    </tbody>
                </table>
            </div>
@stop