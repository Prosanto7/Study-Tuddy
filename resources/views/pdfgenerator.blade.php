<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>
            Study Tuddy Report
        </title>
        <style>
            table, th, td {
                border: 1px solid black;
                text-align:center;
                font-size:10px;
            }
        </style>
    </head>

    <body> 
            <div class="container mt-5 mb-5 text-center">
                <h2>Progress Report</h2>
                <h3>Date : <?php echo date('d/m/Y') ?></h3>
            </div>    
            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center" id="topicTable">
                        @php 
                            $i = 1;
                            $totalPercentage = 0;
                            $totalCount = 0;
                        @endphp
                            <tr>
                                <th>No</th>
                                <th>Subject or Course Title</th>
                                <th>Topics</th>
                                <th>Classes Required</th>
                                <th>Classes Completeed</th>
                                <th>Percentage</th>
                            </tr>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$subject->subject}}
                                    @php
                                        $perSebjectPercantage = 0;
                                        $subjectCount = 0;
                                    @endphp
                                </td>
                                @foreach($subjectStatus as $subjectstat) 
                                    @if ($subjectstat->subject == $subject->subject) 
                                        <td>
                                           {{$subjectstat->topic}}
                                        </td>
                                        <td>
                                            {{$subjectstat->status}}
                                        </td>
                                        <td>   
                                            {{$subjectstat->completed}}
                                        </td>
                                        <td>
                                            @php
                                                if ($subjectstat->status < $subjectstat->completed) {
                                                    $percentage = 100;
                                                }
                                                else {
                                                    $percentage = $subjectstat->completed / $subjectstat->status * 100;
                                                }

                                                $subjectCount++;
                                                $totalCount++;
                                                $perSebjectPercantage += $percentage;
                                                $totalPercentage += $percentage;
                                            @endphp

                                            {{number_format((float) $percentage, 2, '.', '') . ' %'}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                    @endif    
                                @endforeach   
                                <td colspan = "3" style="text-align:right; font-weight:bold;">Total Percentage  </td> 
                                <td style="font-weight:bold;"> 
                                    @php
                                        $subPercentage = $perSebjectPercantage / 10;
                                    @endphp
                                    {{number_format((float) $subPercentage, 2, '.', '') . ' %'}}
                                </td>  

                            </tr>            
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container mt-5 mb-5">
                <table style="width:100%">
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
    </body>
</html>