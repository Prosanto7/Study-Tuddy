@extends('layouts.app')

@section('content')
            <div class="container mt-5 mb-5">
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th colspan="3">
                            <h2 class="text-center fw-bold">Subjects Per Day</h2>
                        </th>
                    </tr>
                    <tr>
                        <th>Day</th>
                        <th>Number of Subjects</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>
                                Saturday
                            </td>
                            <td>
                                4
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sunday
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Monday
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tuesday
                            </td>
                            <td>
                                4
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Wednesday
                            </td>
                            <td>
                                3
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Thursday
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Friday
                            </td>
                            <td>
                                3
                            </td>
                            <td>
                                <button class='btn btn-warning fw-bold' type='submit' name='' value=''>Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
@stop