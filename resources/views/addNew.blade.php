
@extends('main')

@section('content')
<center>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add Product
      </button>
      
</center>
    <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="insert_record" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <input type="text" placeholder="Product Name" class="form-control" name="p_name" id="p_name" required>
            </div>
            <div class="mb-2">
                <input type="text" placeholder="Product Price" class="form-control" name="p_price" id="p_price" required>
            </div>
            <div class="mb-2">
                <input type="file"  class="form-control" name="p_image" id="p_image" required>
            </div>
            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-success ">Add</button>
            </div>
           
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
<div class="container">
  
  <table class="table mt-5">
    <thead class="bg-success text-white fw-bold">
      <th>S.N.</th>
      <th>Name</th>
      <th>Price</th>
      <th>Image</th>
      <th>Edit</th>
      <th>Delete</th>
    </thead>
<tbody>
  @foreach ($prod_data as $index => $data)
  <tr>
    <td class="pt-2">{{ $index+$prod_data->firstItem()}}</td>
    <td class="pt-2">{{ $data->p_name}}</td>
    <td class="pt-2">{{ $data->p_price}}</td>
    <td class="pt-2"> <img width="80px" height="80px" src="images/{{ $data->p_image}}" alt=""></td>
    <td><a href="/edit/{{$data->id}}"><button class="btn btn-success">Edit</button></a></td>
    <td><a href="/delete/{{$data->id}}"><button class="btn btn-danger">Delete</button></a></td>
  </tr>
  @endforeach
 
</tbody>

  </table>

  {{$prod_data->links()}}
  @if ($msg = session('msg'))
  <div class="alert alert-success" role="alert">
      {{$msg}}
    </div>
  @endif
  @if ($delete_msg = session('delete_msg'))
  <div class="alert alert-danger" role="alert">
      {{$delete_msg}}
    </div>
  @endif
</div>
 
@endsection
