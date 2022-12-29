@extends('layout')

@section('content')
            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th colspan="5">
                            <h2 class="text-center fw-bold">Todays Schedule</h2>
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Subject</th>
                        <th>Time</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>

                   
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                Discrete Mathmatics
                            </td>
                            <td>
                                9 am to 10 am
                            </td>
                            <td>
                                60 minutes
                            </td>
                            <td>
                                <button class='btn btn-success fw-bold' type='submit' name='' value=''>Completed</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                Numerical Methods
                            </td>
                            <td>
                                10 am to 10.30 am
                            </td>
                            <td>
                                30 minutes
                            </td>
                            <td>
                                <button class='btn btn-success fw-bold' type='submit' name='' value=''>Completed</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3
                            </td>
                            <td>
                                Java
                            </td>
                            <td>
                                8 pm to 9 pm
                            </td>
                            <td>
                                60 minutes
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Mark As Complete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                4
                            </td>
                            <td>
                                Data Structure
                            </td>
                            <td>
                                6 pm to 8 pm
                            </td>
                            <td>
                                120 minutes
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Mark As Complete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th colspan="5">
                            <h2 class="text-center fw-bold">Weekly Schedule</h2>
                        </th>
                    </tr>
                    <tr>
                        <th>Day/Time</th>
                        <th>9 am - 10 am</th>
                        <th>10 am - 10.30 am</th>
                        <th>6 pm - 8 pm</th>
                        <th>8 pm - 9 pm</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>
                                Saturday
                            </td>
                            <td>
                                Discrete Mathmatics
                            </td>
                            <td>
                                Numerical Methods
                            </td>
                            <td>
                                Java
                            </td>
                            <td>
                                Data Structure
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sunday
                            </td>
                            <td>
                                Numerical Methods
                            </td>
                            <td>
                                Free
                            </td>
                            <td>
                                Free
                            </td>
                            <td>
                                Algorithm
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Monday
                            </td>
                            <td>
                                Free
                            </td>
                            <td>
                                Data Structure
                            </td>
                            <td>
                                Java
                            </td>
                            <td>
                                Free
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tuesday
                            </td>
                            <td>
                                Java
                            </td>
                            <td>
                                Algorithm
                            </td>
                            <td>
                               Numerical Methods
                            </td>
                            <td>
                                Data Science
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Wednesday
                            </td>
                            <td>
                                Free
                            </td>
                            <td>
                                Artificial Intelligence
                            </td>
                            <td>
                               Java
                            </td>
                            <td>
                                Algorithm
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Thursday
                            </td>
                            <td>
                                Algorithm
                            </td>
                            <td>
                                Data Structure
                            </td>
                            <td>
                               Free
                            </td>
                            <td>
                                Free
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Friday
                            </td>
                            <td>
                                Free
                            </td>
                            <td>
                                Numerical Methods
                            </td>
                            <td>
                               Discrete Mathmatics
                            </td>
                            <td>
                                Algorithm
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
@stop