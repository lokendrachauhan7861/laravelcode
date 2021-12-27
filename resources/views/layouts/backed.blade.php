<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
   @include('partialbacked.tophead')


</head>

<body>

@include('partialbacked.sidebar')
 

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

@include('partialbacked.header')

  @yield('content')
 </div><!-- /#right-panel -->
@include('partialbacked.footer')



</body>

</html>
