<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;
use App\Models\Brands;
use Redirect;

class apiController extends Controller
{
    

////products

    public function products() //Listagem de Produtos
    {   
        return response(DB::table('products')
        ->leftJoin('brands', 'brands.id_brand', '=', 'products.brand')
        ->get() , 200);  
    }

    
    public function checkproducts($id) //
    {   
        return response(products::where('id', $id)
        ->leftJoin('brands', 'brands.id_brand', '=', 'products.brand')
        ->get(), 200);  
    }

    public function insertproducts(Request $request) //Insert Produtos
    {

        $origin  = $request->input('origin');
   
        $insertproducts = products::create([
        'name' => $request->input('name'),
        'voltage' => $request->input('voltage'),
        'brand' => $request->input('brand'),
        'description' => $request->input('description')
     ]);
        
        if($insertproducts){
            if($origin != 'site'){
            return http_response_code(200);
            }else{
            return Redirect::to("produtos")  ;
            }
        }

    }


    public function updateproducts(Request $request) //atualiza produtos
    {
        $origin  = $request->input('origin');

        $updateproducts = products::where('id', '=', $request->input('id'))->update([
            'name' => $request->input('name'),
            'voltage' => $request->input('voltage'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description')    
        ]);
       
        
        if($updateproducts){
            if($origin != 'site'){
            return http_response_code(200);
            }else{  
            return back()->with('mensagem', 'Produto Cadastrado com sucesso!');
            }
        }
    

        
    }


    public function delproducts(Request $request) //deleta pessoa e contatos
    
    {
        $id = $request['id']; 
        $origin = $request->input('origin');
        $del = products::where('id', '=', $id)->delete();
        
        if($del){
            if($origin != 'site'){
            return http_response_code(200);
            }else{
            return Redirect::to("produtos")  ;
            }
        }
             
   
    }




/////Brands


public function brands() //Listagem de Produtos
{   
    return response(DB::table('brands')->get() , 200);  
}

public function checkBrands($id) //
{   
    return response(Brands::where('id_brand', $id)->get(), 200);  
}
    
   





    }

    
    

