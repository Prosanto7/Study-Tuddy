@extends('layout')

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
                        <th>am/pm</th>
                        <th>End</th>
                        <th>am/pm</th>
                        <th>Duration</th>
                        <th colspan="2">Action</th>
                    </tr>

                   
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                9
                            </td>
                            <td>
                                am
                            </td>
                            <td>
                                10
                            </td>
                            <td>
                                am
                            </td>
                            <td>
                                60 minutes
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                            <td>
                                <button class='btn btn-danger fw-bold' type='submit' name='' value=''>Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                10
                            </td>
                            <td>
                                am
                            </td>
                            <td>
                                10.30
                            </td>
                            <td>
                                am
                            </td>
                            <td>
                                30 minutes
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                            <td>
                                <button class='btn btn-danger fw-bold' type='submit' name='' value=''>Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3
                            </td>
                            <td>
                                6
                            </td>
                            <td>
                                pm
                            </td>
                            <td>
                                8
                            </td>
                            <td>
                                pm
                            </td>
                            <td>
                                120 minutes
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                            <td>
                                <button class='btn btn-danger fw-bold' type='submit' name='' value=''>Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                4
                            </td>
                            <td>
                                8
                            </td>
                            <td>
                                pm
                            </td>
                            <td>
                                9
                            </td>
                            <td>
                                pm
                            </td>
                            <td>
                                60 minutes
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                            <td>
                                <button class='btn btn-danger fw-bold' type='submit' name='' value=''>Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">am</option>
                                    <option value="">pm</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">am</option>
                                    <option value="">pm</option>
                                </select>
                            </td>
                            <td>
                                
                            </td>
                            <td colspan="2">
                                <button class='btn btn-success fw-bold' type='submit' name='' value=''>Add Time Slot</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
@stop