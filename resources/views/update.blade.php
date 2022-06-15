
@extends('main')

@section('content')
<div class="container w-25" style="    border: 1px solid black;padding: 20px;border-radius: 10px;box-shadow: 5px 5px 5px lightslategrey;">
    <h3>Edit Product</h1>
       
    <form action="/update_record/{{$get_data->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        
        <div class="mb-2">
            <label for="p_name">Product Name</label>
            <input type="text" placeholder="Product Name" class="form-control" name="p_name" id="p_name" value="{{$get_data->p_name}}">
        </div>
        <div class="mb-2">
            <label for="p_price">Product Price</label>
            <input type="text" placeholder="Product Price" class="form-control" name="p_price" id="p_price" value="{{$get_data->p_price}}">
        </div>
        <div class="mb-2">
          
            <img width="80px" height="80px" src="/images/{{ $get_data->p_image}}" alt="">
        </div>
        <div class="mb-2">
            <label for="p_price">Product Image</label>
            <input type="file"  class="form-control" name="p_image" id="p_image">
        </div>
        
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-success ">Update Record</button>
            <a href="/"><button type="button" class="btn btn-danger ">Cancel</button></a>

        </div>
       
      </form>
    
</div>

 
@endsection
