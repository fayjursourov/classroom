@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Session;
@endphp

@section('content')
    <main class="py-4" style="margin-top: 65px;">
    <div class="container">
        @if( session::get('success') )
            <div class="alert alert-success">
                <strong>{{ session::get('success') }}</strong>
            </div>

        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student Attendance List</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">SL no.</th>
                                <th scope="col">Name</th>
                                <th scope="col">ID</th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Approve Button</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Md Fayjur Rahman</td>
                                <td>5</td>
                                <td>Math</td>
                                <td>17-10-2018</td>
                                <from>
                                    <td>
                                        <select>
                                            <option>Not Approve</option>
                                            <option>Approve</option>
                                        </select>
                                    <td><input type="submit"></td>
                                </from>
                            </tr>

                            <tr>
                                <th scope="row">1</th>
                                <td>Md Fayjur Rahman</td>
                                <td>5</td>
                                <td>Math</td>
                                <td>17-10-2018</td>
                                <from>
                                    <td>
                                        <select>
                                            <option>Not Approve</option>
                                            <option>Approve</option>
                                        </select>
                                    <td><input type="submit"></td>
                                </from>
                            </tr>

                            <tr>
                                <th scope="row">1</th>
                                <td>Md Fayjur Rahman</td>
                                <td>5</td>
                                <td>Math</td>
                                <td>17-10-2018</td>
                                <from>
                                    <td>
                                        <select>
                                            <option>Not Approve</option>
                                            <option>Approve</option>
                                        </select>
                                    <td><input type="submit"></td>
                                </from>
                            </tr>

                            <tr>
                                <th scope="row">1</th>
                                <td>Md Fayjur Rahman</td>
                                <td>5</td>
                                <td>Math</td>
                                <td>17-10-2018</td>
                                <from>
                                    <td>
                                        <select>
                                            <option>Not Approve</option>
                                            <option>Approve</option>
                                        </select>
                                    <td><input type="submit"></td>
                                </from>
                            </tr>

                            <tr>
                                <th scope="row">1</th>
                                <td>Md Fayjur Rahman</td>
                                <td>5</td>
                                <td>Math</td>
                                <td>17-10-2018</td>
                                <from>
                                    <td>
                                        <select>
                                            <option>Not Approve</option>
                                            <option>Approve</option>
                                        </select>
                                    <td><input type="submit"></td>
                                </from>
                            </tr>

                            <tr>
                                <th scope="row">1</th>
                                <td>Md Fayjur Rahman</td>
                                <td>5</td>
                                <td>Math</td>
                                <td>17-10-2018</td>
                                <from>
                                    <td>
                                        <select>
                                            <option>Not Approve</option>
                                            <option>Approve</option>
                                        </select>
                                    <td><input type="submit"></td>
                                </from>
                            </tr>


                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
        </div>
    </div>
    </main>

@endsection




