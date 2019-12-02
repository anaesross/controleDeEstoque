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
            return view('products.formUpdate', ["product"=>$product]); //criar nome do array, criar array associado e colocar  a variavel da busca(linha acima)    }
        }else{
            return view('products.formUpdate'); 
        }
    }
    public function update(Request $request){
        //Para atualizar devemos buscar um objeto ao invez de criar,
        // usando Product::find($idProduto)
        //Vai ser necessario usar rotas com parametro     

        $product = Product::find($request->idProduct); //enviando o id do produto selecionado
        $product->name = $request->nameProduct;
        $product->description = $request->descriptionProduct;
        $product->quantity = $request->quantityProduct;
        $product->price = $request->priceProduct;
  
        $result = $product->save();
  
        return view('products.formUpdate', ["result"=>$result]);
      }

    public function delete(Request $request, $id=0){//caso nao passe nennhum id ele recebe o valor de zero
        // para deletar vc vai usar Product::destroy($id)
        $result = Product::destroy($id);

        if($result){
            return redirect('/produtos');
        } else{
            echo "Não foi possível deletar o produto";
        }
    }

    public function viewAllProducts(Request $request){
        // vai precisar do Product::All()

        $listProducts = Product::all();

        return view('products.products', ['listProducts'=>$listProducts]); // primeira informação nome das pasta dps o nome da view.
    }

    public function viewOneProduct(Request $request){
        // vai precisar do Product::find($idProduct)
    }
}