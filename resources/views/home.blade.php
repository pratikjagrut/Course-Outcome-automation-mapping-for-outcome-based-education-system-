@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>FACULTY INFORMATION</h3>
                </div>     

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table>
                        <tr class="table">
                            <tr>
                                <td>
                                    <img class="img-responsive img-rounded img-size" src="/storage/profile_pics/{{$profile->profile_pic}}">
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tr>
                    </table>
                    <br>
                    <table class="table table-striped">
                        <tr>
                            <td>Faculty Name</td>
                            <td>:</td>
                            <td> {{Auth::user()->name}} </td>
                        </tr>
                        <tr>
                            <td>Faculty Id</td>
                            <td>:</td>
                            <td>{{$profile->teacher_id}}</td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td>:</td>
                            <td>{{$profile->designation}}</td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td>:</td>
                            <td>{{$profile->department}}</td>
                        </tr>
                        <tr>
                            <td>College</td>
                            <td>:</td>
                            <td>{{$profile->college}}</td>
                        </tr>
                        <tr>
                            <td>Email Id</td>
                            <td>:</td>
                            <td> {{Auth::user()->email}} </td>
                        </tr>
                        <tr>
                            <td>Contact number</td>
                            <td>:</td>
                            <td>{{$profile->contact_number}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>{{$profile->address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>PANEL 2</h3>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
