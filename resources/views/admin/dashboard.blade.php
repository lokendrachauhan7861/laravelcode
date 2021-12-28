@extends('layouts.backed')


@section('content')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

           <a href="{{ route('allUser') }}"><div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                       
                       <!--  <h4 class="mb-0">
                            <span class="count">10</span>
                        </h4> -->
                        <p class="text-light">User</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            
                        </div>

                    </div>

                </div>
            </div></a>
            <!--/.col-->

           
        </div> <!-- .content -->
   


@stop

@section('title')
Dashboard
@endsection