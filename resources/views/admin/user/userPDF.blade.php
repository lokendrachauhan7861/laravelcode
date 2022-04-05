 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Designation</th>
    </tr>
  </thead>
  <tbody>
     @php $i = 1; @endphp
     @foreach($allUser as $value)
    <tr>
      <th scope="row">{{ $i }}</th>
      <td>{{ $value['name'] }}</td>
      <td>{{ $value['email'] }}</td>
      <td>{{ $value['phone'] }}</td>
      <td>{{ $value['designation'] }}</td>
    </tr>
    @php $i++; @endphp
      @endforeach
  </tbody>
</table>