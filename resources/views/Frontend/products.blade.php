@extends('layouts.frontendUser')

@section('content')

   <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>

        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
           <input type="checkbox" name="watch" value="watch" class="common_selector brand" > Watch<br>
           <input type="checkbox" name="bag" value="bag" class="common_selector brand"> Bag <br>
        </div><br>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 hidedata">
        
             @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <img src="{{ url($product->image) }}" alt="" class="w-full max-h-60" style="width:100px;height:100px;">
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                    <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                    </form>
                </div>
                
            </div>
            @endforeach
             <div class="d-felx justify-content-center">

         {!! $products->render() !!} 


        </div>
          
        </div>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 showdata">
        
        </div>
    </div>
    <script>

$(document).ready(function(){

  $(".common_selector").click(function(){

  filter_data(1);


  function filter_data(page)

  {

 
   var brand = get_filter('brand');



    $.ajax({

    
      url: "{{ route('product_ajax_data_filter') }}" +'?page='+page,

      method:"get",

      dataType:"JSON",

      data:{'brand':brand,'_token':"{{csrf_token()}}"},

     

      success:function(data)

      {
        console.log(data);
        $('.hidedata').hide();
        $('.showdata').html(data.allData);

      }

    });

  }


   function get_filter(class_name)

  {

    var filter = [];

    $('.'+class_name+':checked').each(function(){

      filter.push($(this).val());

    });

    return filter;

  }

  $(document).on("click", ".pagination a", function(event){

    event.preventDefault();

   var page = $(this).attr('href').split('page=')[1];

    filter_data(page);

  });


  $('.common_selector').click(function(){

        filter_data(1);

    });


  });

});


</script>
@endsection




