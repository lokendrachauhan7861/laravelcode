@extends('layouts.backed')

@section('content')
   <div class="card">
        @if (session()->has('success'))
        <div class="alert alert-success">

        <p>{{ session('success') }}</p>

        </div>
        @endif 


                                                  
        <div class="card-header">
            <strong>Edit User</strong> 
        </div>

         <form  method="post" action="{{ route('user/update') }}" enctype="multipart/form-data" class="form-horizontal">                                     
         <div class="card-body card-block">
           
            {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$editUser[0]['id']}}">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Name</label><span style="color:red">*</span></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{$editUser[0]['name']}}" placeholder="User Name" class="form-control">
                    @if($errors->has('name')) 
                    <p class="req">
                    {{ $errors->first('name') }} 
                    </p>
                    @endif
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Email</label><span style="color:red">*</span></div>
                    <div class="col-12 col-md-9"><input type="email" id="text-input" name="email" value="{{$editUser[0]['email']}}" placeholder="email" class="form-control">
                    @if($errors->has('email')) 
                    <p class="req">
                    {{ $errors->first('email') }} 
                    </p>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone No</label><span style="color:red">*</span></div>
                    <div class="col-12 col-md-9"><input type="number" id="text-input" name="phone" value="{{$editUser[0]['phone']}}" placeholder="Phone No" class="form-control">
                    @if($errors->has('email')) 
                    <p class="req">
                    {{ $errors->first('email') }} 
                    </p>
                    @endif
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Status</label><span style="color:red">*</span></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-checkbox" class="form-check-label ">
                                <input type="radio"  name="status" {{ ($editUser[0]['status'] == 1) ? 'checked' : '' }}   value="1" class="form-check-input" >Active
                            </label> &nbsp;&nbsp;
                            <label for="inline-checkbox" class="form-check-label ">
                                <input type="radio" name="status" {{ ($editUser[0]['status'] == 0) ? 'checked' : '' }}  name="inline-checkbox2" value="0" class="form-check-input">Inactive
                            </label>
                        </div>
                    </div>
                </div>
                  
        </div>
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Update
            </button>
          
        </div>
        </form>
  </div>
@stop
