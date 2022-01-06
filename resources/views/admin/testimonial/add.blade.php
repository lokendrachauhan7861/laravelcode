@extends('layouts.backed')

@section('content')
   <div class="card">
        @if (session()->has('success'))
        <div class="alert alert-success">

        <p>{{ session('success') }}</p>

        </div>
        @endif 


                                                  
        <div class="card-header">
            <strong>Add Testimonial</strong> 
        </div>

         <form  method="post" action="{{ route('storeTestimonial') }}" enctype="multipart/form-data" class="form-horizontal">                                     
         <div class="card-body card-block">
           
            {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Testimonial Name</label><span style="color:red">*</span></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{ old('name') }}" placeholder="Testimonial Name" class="form-control">
                    @if($errors->has('name')) 
                    <p class="req">
                    {{ $errors->first('name') }} 
                    </p>
                    @endif
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Author Name</label><span style="color:red">*</span></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="author_name" value="{{ old('author_name') }}" placeholder="Author Name" class="form-control">
                    @if($errors->has('author_name')) 
                    <p class="req">
                    {{ $errors->first('author_name') }} 
                    </p>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label><span style="color:red">*</span></div>
                    <div class="col-12 col-md-9"> <textarea name="description" id="editor1">{{ old('description') }}</textarea>
                    @if($errors->has('description')) 
                    <p class="req">
                    {{ $errors->first('description') }} 
                    </p>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Image(Optional)</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="text-input" name="image"  class="form-control" accept="image/png, image/gif, image/jpeg">
                   
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Status</label><span style="color:red">*</span></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-checkbox" class="form-check-label ">
                                <input type="radio"  name="status"  value="1" class="form-check-input" >Active
                            </label> &nbsp;&nbsp;
                            <label for="inline-checkbox" class="form-check-label ">
                                <input type="radio" name="status" name="inline-checkbox2" value="0" class="form-check-input">Inactive
                            </label>
                        </div>
		                    @if($errors->has('status')) 
		                    <p class="req">
		                    {{ $errors->first('status') }} 
		                    </p>
		                    @endif
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
