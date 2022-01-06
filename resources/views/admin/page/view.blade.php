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
                            <strong class="card-title">Page List</strong>
                        </div>
                       
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Page Name</th>
                                        <th>Page Slug</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allPage as $page)
                                    <tr>
                                        <td>{{ $page['p_name'] }}</td>
                                        <td>{{ $page['p_slug'] }}</td>
                                        <td style="width:35px;height:100px;"><img src="{{ url('uploads/page/'.$page['image']) }}"></td>
                                        <td>{{ $page['description'] }}</td>
                                        @if($page['status'] == '1')
                                        <td style="color:green;">Active</td>
                                         @else
                                        <td style="color:red;">Inactive</td>
                                        @endif
                                         
                                        <td><a href="{{ route('page/edit',$page['id']) }}"><i class="fa fa-edit" style="font-size:35px;color:green;"></i></a> &nbsp; &nbsp; <a href="{{ route('pagedelete',$page['id']) }}" onclick="return confirm('Are you sure you want to Remove?');"><i class="fa fa-trash-o" style="font-size:35px;color:red"></i></a></td>
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