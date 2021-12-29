@extends('layouts.backed')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        @if (session()->has('delete'))
                        <div class="alert alert-danger">

                        <p>{{ session('delete') }}</p>

                        </div>
                        @endif 
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                        </div>
                        @endif

                        <div class="card-header">
                            <strong class="card-title">User List</strong>
                        </div>
                       
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Phone No</th>
                                        <th>Designation</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allUser as $user)
                                    <tr>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user['phone'] }}</td>
                                        <td>{{ $user['designation'] }}</td>
                                        @if($user['status'] == '1')
                                        <td style="color:green;">Active</td>
                                         @else
                                        <td style="color:red;">Inactive</td>
                                        @endif
                                         
                                        <td><a href="{{ route('user/edit',$user['id']) }}"><i class="fa fa-edit" style="font-size:35px;color:green;"></i></a> &nbsp; &nbsp; <a href="{{ route('userdelete',$user['id']) }}" onclick="return confirm('Are you sure you want to Remove?');"><i class="fa fa-trash-o" style="font-size:35px;color:red"></i></a></td>
                                    </tr>
                                    @endforeach
                                   </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@stop