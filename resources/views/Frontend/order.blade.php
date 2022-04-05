@extends('layouts.frontendUser')

@section('content')

   <table>
  <thead>
    <tr>
      <th scope="col" width="100px">User Name</th>
      <th scope="col" width="200px">Email</th>
      <th scope="col" width="200px">Product Name</th>
      <th scope="col" width="100px">Price</th>
    </tr>
  </thead>
  <tbody border="1">
  	@forelse ($orderData as $value)
    <tr>
      <td >{{ $value->username; }}</td>
      <td >{{ $value->email; }}</td>
      <td >{{ $value->productname; }}</td>
      <td >{{ $value->price; }}</td>
    </tr>
    @empty
    <tr><td>Data Not Found.</td></tr>
    @endforelse
    
  </tbody>

</table>
{{ $orderData->links() }} 
@endsection




