@extends('layouts.backed')

@section('content')
   <div class="card">
        @if (session()->has('success'))
        <div class="alert alert-success">

        <p>{{ session('success') }}</p>

        </div>
        @endif 


                                                  
        <div class="card-header">
            <strong>Edit Page</strong> 
        </div>

         <form  method="post" action="{{ route('page/update') }}" enctype="multipart/form-data" class="form-horizontal">                                     
         <div class="card-body card-block">
           
            {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$editPage[0]['id']}}">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Page Name</label><span style="color:red">*</span></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="p_name" value="{{$editPage[0]['p_name']}}" placeholder="Page Name" class="form-control">
                    @if($errors->has('p_name')) 
                    <p class="req">
                    {{ $errors->first('p_name') }} 
                    </p>
                    @endif
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Slug Name</label><span style="color:red">*</span></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="p_slug" value="{{$editPage[0]['p_slug']}}" placeholder="Slug Name" class="form-control">
                    @if($errors->has('p_slug')) 
                    <p class="req">
                    {{ $errors->first('p_slug') }} 
                    </p>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Page Description</label><span style="color:red">*</span></div>
                    <div class="col-12 col-md-9"> <textarea name="description" id="editor1">{{$editPage[0]['description']}}</textarea>
                    @if($errors->has('description')) 
                    <p class="req">
                    {{ $errors->first('description') }} 
                    </p>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Image</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="text-input" name="image"  class="form-control" accept="image/png, image/gif, image/jpeg">
                   
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Status</label><span style="color:red">*</span></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-checkbox" class="form-check-label ">
                                <input type="radio"  name="status" {{ ($editPage[0]['status'] == 1) ? 'checked' : '' }}   value="1" class="form-check-input" >Active
                            </label> &nbsp;&nbsp;
                            <label for="inline-checkbox" class="form-check-label ">
                                <input type="radio" name="status" {{ ($editPage[0]['status'] == 0) ? 'checked' : '' }}  name="inline-checkbox2" value="0" class="form-check-input">Inactive
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
   <script>
    CKEDITOR.replace( 'editor1' );
   </script>
   <style type="text/css">
    .req {
        color:red;
    }
   </style>
@stop
