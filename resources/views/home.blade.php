@extends('layouts.app')

@section('content')
            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th colspan="7">
                            <h2 class="text-center fw-bold">Todays Schedule</h2>
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Subject</th>
                        <th>Topic</th>
                        <th>Time</th>
                        <th>Duration</th>
                        <th>Resource</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $date = date('l') ;
                        //$date = 'Tuesday';
                        if ($date == 'Saturday') {
                            $index = 0;
                            $day = $subjectsPerDay->saturday;
                        } else if ($date == 'Sunday') {
                            if ($subjectsPerDay->saturday > count($timeSlots)) {
                                $subjectsPerDay->saturday = count($timeSlots);
                            }
                            $index = $subjectsPerDay->saturday;
                            $day = $subjectsPerDay->sunday;
                        } else if ($date == 'Monday') {
                            if ($subjectsPerDay->saturday > count($timeSlots)) {
                                $subjectsPerDay->saturday = count($timeSlots);
                            }

                            if ($subjectsPerDay->sunday > count($timeSlots)) {
                                $subjectsPerDay->sunday = count($timeSlots);
                            }
                            $index = $subjectsPerDay->saturday + $subjectsPerDay->sunday;
                            $day = $subjectsPerDay->monday;
                        } else if ($date == 'Tuesday') {
                            if ($subjectsPerDay->saturday > count($timeSlots)) {
                                $subjectsPerDay->saturday = count($timeSlots);
                            }

                            if ($subjectsPerDay->sunday > count($timeSlots)) {
                                $subjectsPerDay->sunday = count($timeSlots);
                            }

                            if ($subjectsPerDay->monday > count($timeSlots)) {
                                $subjectsPerDay->monday = count($timeSlots);
                            }

                            $index = $subjectsPerDay->saturday + $subjectsPerDay->sunday + $subjectsPerDay->monday;
                            $day = $subjectsPerDay->tuesday;
                        } else if ($date == 'Wednesday') {
                            if ($subjectsPerDay->saturday > count($timeSlots)) {
                                $subjectsPerDay->saturday = count($timeSlots);
                            }

                            if ($subjectsPerDay->sunday > count($timeSlots)) {
                                $subjectsPerDay->sunday = count($timeSlots);
                            }

                            if ($subjectsPerDay->monday > count($timeSlots)) {
                                $subjectsPerDay->monday = count($timeSlots);
                            }

                            if ($subjectsPerDay->tuesday > count($timeSlots)) {
                                $subjectsPerDay->tuesday = count($timeSlots);
                            }

                            $index = $subjectsPerDay->saturday + $subjectsPerDay->sunday + $subjectsPerDay->monday +  $subjectsPerDay->tuesday;
                            $day = $subjectsPerDay->wednesday;
                        } else if ($date == 'Thursday') {
                            if ($subjectsPerDay->saturday > count($timeSlots)) {
                                $subjectsPerDay->saturday = count($timeSlots);
                            }

                            if ($subjectsPerDay->sunday > count($timeSlots)) {
                                $subjectsPerDay->sunday = count($timeSlots);
                            }

                            if ($subjectsPerDay->monday > count($timeSlots)) {
                                $subjectsPerDay->monday = count($timeSlots);
                            }

                            if ($subjectsPerDay->tuesday > count($timeSlots)) {
                                $subjectsPerDay->tuesday = count($timeSlots);
                            }

                            if ($subjectsPerDay->wednesday > count($timeSlots)) {
                                $subjectsPerDay->wednesday = count($timeSlots);
                            }

                            $index = $subjectsPerDay->saturday + $subjectsPerDay->sunday + $subjectsPerDay->monday +  $subjectsPerDay->tuesday + $subjectsPerDay->wednesday;
                            $day = $subjectsPerDay->thursday;
                        } else if ($date == 'Friday') {
                            if ($subjectsPerDay->saturday > count($timeSlots)) {
                                $subjectsPerDay->saturday = count($timeSlots);
                            }

                            if ($subjectsPerDay->sunday > count($timeSlots)) {
                                $subjectsPerDay->sunday = count($timeSlots);
                            }

                            if ($subjectsPerDay->monday > count($timeSlots)) {
                                $subjectsPerDay->monday = count($timeSlots);
                            }

                            if ($subjectsPerDay->tuesday > count($timeSlots)) {
                                $subjectsPerDay->tuesday = count($timeSlots);
                            }

                            if ($subjectsPerDay->wednesday > count($timeSlots)) {
                                $subjectsPerDay->wednesday = count($timeSlots);
                            }

                            if ($subjectsPerDay->thursday > count($timeSlots)) {
                                $subjectsPerDay->thursday = count($timeSlots);
                            }

                            $index = $subjectsPerDay->saturday + $subjectsPerDay->sunday + $subjectsPerDay->monday +  $subjectsPerDay->tuesday + $subjectsPerDay->wednesday + $subjectsPerDay->thursday;
                            $day = $subjectsPerDay->friday;
                        }

                        //echo $index .  " " . $day;
                    ?>
                    <tbody>
                        @for($i = 0; $i < count($timeSlots); $i++)
                            @if ($i < $day && $index < count($subjectStatus))
                            <tr>
                                <td>
                                    {{$i + 1}}
                                </td>
                                <td>
                                    {{$subjectStatus[$index]->subject}}
                                </td>
                                <td>
                                    {{$subjectStatus[$index]->topic}}
                                </td>
                                <td>
                                    {{date('h:i A', strtotime($timeSlots[$i]->start)) . ' - ' . date('h:i A', strtotime($timeSlots[$i]->end))}}
                                </td>
                                <td>
                                    @php
                                        $duration = (strtotime($timeSlots[$i]->end) - strtotime($timeSlots[$i]->start)) / 60;
                                        if ($duration >= 60) {
                                            echo (int)($duration / 60)." hour " . ($duration % 60) . " minutes";
                                        } else {
                                            echo $duration." minutes";
                                        }
                                    @endphp
                                </td>
                                <td>
                                    @if ($subjectStatus[$index]->file_name != "")
                                        <a class="btn btn-primary" target="_blank" href="{{url('openPDF/'.$subjectStatus[$index]->file_name)}}">PDF</a>
                                    @endif
                                </td>
                                <td>
                                    @if($subjectStatus[$index]->last_date != date("Y-m-d")) 
                                        <form action="{{url('setcompleted')}}" method="POST">
                                        @csrf
                                            <button class="btn btn-warning fw-bold" value="{{$subjectStatus[$index]->id}}" name="rowId">Mark as Complete</button>
                                        </form>
                                    @else
                                        <button class="btn btn-success fw-bold">Completed</button>
                                    @endif
                                </td>
                                <?php
                                    $index++;
                                ?>
                            </tr>
                            @endif      
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th colspan="{{count($timeSlots) + 1}}">
                            <h2 class="text-center fw-bold">Weekly Schedule</h2>
                        </th>
                    </tr>
                    <tr>
                    <th>Day/Time</th>
                    @foreach ($timeSlots as $timeSlot)
                        <th>{{date('h:i A', strtotime($timeSlot->start)) . ' - ' . date('h:i A', strtotime($timeSlot->end))}}</th>
                    @endforeach    
                    </tr>
                    <tbody>
                        <?php
                            $index = 0;
                        ?>
                        <tr>
                            <td>
                                Saturday
                            </td>
                            @for($i = 0; $i < count($timeSlots); $i++)
                                @if ($i < $subjectsPerDay->saturday && $index < count($subjectStatus))
                                    <td>
                                        {{$subjectStatus[$index]->subject}}
                                        <br>
                                        {{$subjectStatus[$index]->topic}}
                                    </td>
                                    <?php
                                        $index++;
                                    ?>
                                @else 
                                    <td>Free</td>
                                @endif    
                                
                            @endfor
                        </tr>
                        <tr>
                            <td>
                                Sunday
                            </td>
                            @for($i = 0; $i < count($timeSlots); $i++)
                                @if ($i < $subjectsPerDay->sunday && $index < count($subjectStatus))
                                    <td>
                                        {{$subjectStatus[$index]->subject}}
                                        <br>
                                        {{$subjectStatus[$index]->topic}}
                                    </td>
                                    <?php
                                        $index++;
                                    ?>
                                @else 
                                    <td>Free</td>
                                @endif    
                               
                            @endfor
                        </tr>
                        <tr>
                            <td>
                                Monday
                            </td>
                            @for($i = 0; $i < count($timeSlots); $i++)
                                @if ($i < $subjectsPerDay->monday && $index < count($subjectStatus))
                                    <td>
                                        {{$subjectStatus[$index]->subject}}
                                        <br>
                                        {{$subjectStatus[$index]->topic}}
                                    </td>
                                    <?php
                                        $index++;
                                    ?>
                                @else 
                                    <td>Free</td>
                                @endif    
                                
                            @endfor
                        </tr>
                        <tr>
                            <td>
                                Tuesday
                            </td>
                            @for($i = 0; $i < count($timeSlots); $i++)
                                @if ($i < $subjectsPerDay->tuesday && $index < count($subjectStatus))
                                    <td>
                                        {{$subjectStatus[$index]->subject}}
                                        <br>
                                        {{$subjectStatus[$index]->topic}}
                                    </td>
                                    <?php
                                        $index++;
                                    ?>
                                @else 
                                    <td>Free</td>
                                @endif    
                                
                            @endfor
                        </tr>
                        <tr>
                            <td>
                                Wednesday
                            </td>
                            @for($i = 0; $i < count($timeSlots); $i++)
                                @if ($i < $subjectsPerDay->wednesday && $index < count($subjectStatus))
                                    <td>
                                        {{$subjectStatus[$index]->subject}}
                                        <br>
                                        {{$subjectStatus[$index]->topic}}
                                    </td>
                                    <?php
                                        $index++;
                                    ?>
                                @else 
                                    <td>Free</td>
                                @endif    
                                
                            @endfor
                            
                        </tr>
                        <tr>
                            <td>
                                Thursday
                            </td>
                            @for($i = 0; $i < count($timeSlots); $i++)
                                @if ($i < $subjectsPerDay->thursday && $index < count($subjectStatus))
                                    <td>
                                        {{$subjectStatus[$index]->subject}}
                                        <br>
                                        {{$subjectStatus[$index]->topic}}
                                    </td>
                                    <?php
                                        $index++;
                                    ?>
                                @else 
                                    <td>Free</td>
                                @endif    
                                
                            @endfor
                        </tr>
                        <tr>
                            <td>
                                Friday
                            </td>
                            @for($i = 0; $i < count($timeSlots); $i++)
                                @if ($i < $subjectsPerDay->friday && $index < count($subjectStatus))
                                    <td>
                                        {{$subjectStatus[$index]->subject}}
                                        <br>
                                        {{$subjectStatus[$index]->topic}}
                                    </td>
                                    <?php
                                        $index++;
                                    ?>
                                @else 
                                    <td>Free</td>
                                @endif    
                                
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
@stop