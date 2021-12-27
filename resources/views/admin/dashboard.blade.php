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

          <!--   <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> -->


            <a href="{{ url('admin/view/package') }}"><div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                       
                       <!--  <h4 class="mb-0">
                            <span class="count">10</span>
                        </h4> -->
                        <p class="text-light">Package</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            
                        </div>

                    </div>

                </div>
            </div></a>
            <!--/.col-->

            <a href="{{ url('admin/view/testimonial') }}"><div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                       
                        
                        <p class="text-light">Testimonials</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div></a>
            <!--/.col-->

            <a href="{{ url('admin/view/portfolio') }}"><div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        
                      
                        <p class="text-light">Portfolio</p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div></a>
            <!--/.col-->

           <a href="{{ url('admin/view/clientlogo') }}"> <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                      
                        
                        <p class="text-light">Client</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div></a>
           
        </div> <!-- .content -->
   


@stop

@section('title')
Dashboard
@endsection