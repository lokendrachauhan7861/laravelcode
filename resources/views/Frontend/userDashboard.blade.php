@extends('layouts.frontendUser')

@section('content')

<div class="col-md-10">
	<div class="row sty" >
	
        
    <div class="col-sm-12" style="text-align:center;margin-top:43px;">
     @if($getUser[0]['pic'])
      <img src="{{ url('/uploads/'. $getUser[0]['pic']) }}" class="rounded-circle" alt="Cinque Terre" width="304" height="236">
      @else
      <img src="{{ url('/uploads/default-img/default.png') }}" class="rounded-circle" alt="Cinque Terre" width="304" height="236">
      @endif
     </div>
     <div class="col-sm-12" style="text-align:center;font-size: 40px;font-weight: 600;">
     <p>!! WellCome !!</p>
     </div>
     <div class="col-sm-12" style="text-align:center;font-size: 30px;">
     <p> {{ $getUser[0]['name'] }} </p>
     </div>
      <div class="col-sm-12" style="text-align:center;font-size: 22px;">
     <p> {{ $getUser[0]['designation'] }} </p>
     </div>
    
    </div>
</div>

@endsection