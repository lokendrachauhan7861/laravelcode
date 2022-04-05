@extends('layouts.backed')

@section('content')
   <div class="card">
        @if (session()->has('success'))
        <div class="alert alert-success">

        <p>{{ session('success') }}</p>

        </div>
        @endif 
         @if (count($errors) > 0)
        <div class="alert alert-danger">

         <h4><i class="icon fa fa-ban"></i> Error!</h4>
                          @foreach($errors->all() as $error)
                          {{ $error }} <br>
                          @endforeach    

        </div>
        @endif 
        @if (session()->has('emptyfile'))
        <div class="alert alert-danger">

        <p>{{ session('emptyfile') }}</p>

        </div>
        @endif

                                                  
        <div class="card-header">
            <strong>Csv</strong> 
        </div>

         <form  method="post" action="{{ route('importProduct') }}" enctype="multipart/form-data" class="form-horizontal">                                     
         <div class="card-body card-block">
           
            {{ csrf_field() }}
               

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Upload Csv:-</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="text-input" name="file"  class="form-control" >
                   
                    </div>
                </div>

                
                  
        </div>
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Upload
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
