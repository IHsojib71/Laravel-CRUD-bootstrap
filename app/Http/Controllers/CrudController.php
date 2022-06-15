<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class CrudController extends Controller
{
    public function insert(Request $req){
        $prod = new Product();
       
            $name = $req->get('p_name');  
            $price = $req->get('p_price');  
            $image = $req->file('p_image')->getClientOriginalName();  
          
          //move uploaded file
          $req->p_image->move(public_path('images'),$image);
          $prod->p_name = $name;
          $prod->p_price = $price;
          $prod->p_image = $image;
          $prod->save();
       
     
    return redirect('/');
}

public function get_data(){
    $prod_data = Product::orderBy('id', 'desc')->paginate(5);

    return view('addNew',['prod_data'=>$prod_data]);
}

public function edit_data($id){
    $id = request('id');
    $get_data = Product::where('id',$id)->first();
    // return $get_data;
    return view('update',['get_data'=>$get_data]);
}

public function update(Request $req,$id){
    
    
    $update_data = Product::where('id',$id)->first();
    
    if($req->file('p_image')==null){
        $update_data->p_name = $req->p_name;
        $update_data->p_price = $req->p_price;
        $update_data->update();
    }else{
        $path = 'images/'.$update_data->p_image;
        if(File::exists($path)){
            File::delete($path);
        }
        $image= $req->file('p_image')->getClientOriginalName();
        $update_data->p_name = $req->p_name;
        $update_data->p_price = $req->p_price;
        $update_data-> p_image=$image;  
        //move uploaded file
        $req->p_image->move('images/',$image);
        $update_data->update();
    }
    
    return redirect('/');
   
   
}

public function delete_data($id){
    $data = Product::find($id);
    $data->delete();
    return redirect('/');
}


}
