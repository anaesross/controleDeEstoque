<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;



class ProductController extends Controller {
    public $nome;

    public function create(Request $request){

      $newProduct = new Product();
      $newProduct->name = $request->nameProduct;
      $newProduct->description = $request->descriptionProduct;
      $newProduct->quantity = $request->quantityProduct;
      $newProduct->price = $request->priceProduct;
      $newProduct->user_id = Auth::user()->id;

      $result = $newProduct->save();

      return view('products.formRegister', ["result"=>$result]);
    }

    public function viewForm(Request $request){
        return view('products.formRegister');
    }

    public function viewFormUpdate(Request $request, $id=0){ //se nao tiver passado um id
        $product = Product::find($id); // procura no banco qual variavel tem o id selecionado e retorna os valores
        //criar a variavel produto , parametrizar com a classe criada Product criar a function do larvael find e passar o parametro que gostariamos de busca no caso o id do produto.
        if($product){
            return view('product.formUpdate', ["product"=>$product]); //criar nome do array, criar array associado e colocar  a variavel da busca(linha acima)    }
        }else{
            return view('products.formUpdate'); 
        }
    }
    public function update(Request $request){
        //Para atualizar devemos buscar um objeto ao invez de criar,
        // usando Product::find($idProduto)
        //Vai ser necessario usar rotas com parametro     
        $newProduct = new Product();
        $newProduct->name = $request->nameProduct;
        $newProduct->description = $request->descriptionProduct;
        $newProduct->quantity = $request->quantityProduct;
        $newProduct->price = $request->priceProduct;
        $newProduct->user_id = Auth::user()->id;
  
        $result = $newProduct->save();
  
        return view('products.formRegister', ["result"=>$result]);
      }
    }

    public function delete(Request $request){
        // para deletar vc vai usar Product::destroy($id)
    }

    public function viewAllProducts(Request $request){
        // vai precisar do Product::All()
    }

    public function viewOneProduct(Request $request){
        // vai precisar do Product::find($idProduct)
    }
}