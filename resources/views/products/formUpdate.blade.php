@extends('layouts.app');

@section('content')
   
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Cadastro de Produto</h1>
            </div>
        </div>
        @if(isset($product))
        <form action="/produtos/atualizar" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" value="{{ $product->id }}" name="idProduct" hidden/>
            <div class="form-group">
                <label for="nameProduct">Nome do Produto</label>
                <input class="form-control" type="text" name="nameProduct" id="nameProduct" value="{{ $product->name }}"/>
            </div>
            <div class="form-group">
                <label for="descriptionProduct">Descrição</label>
                <textarea id="descriptionProduct" name="descriptionProduct" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="quantityProduct">Quantidade do Produto</label>
                <input class="form-control" type="number" name="quantityProduct" id="quantityProduct"  value="{{ $product->quantity }}">
            </div>
            <div class="form-group">
                <label for="priceProduct">Preço do Produto</label>
                <input class="form-control" type="number" name="priceProduct" id="priceProduct"  value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="imgProduct">Imagem do Produto</label>
                <input class="form-control" type="file" name="imgProduct" id="imgProduct"  value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Atualizar Produto</button>
            </div>
        @elseif(isset($result))
        @else
            <h1>O produto não existe!</h1>
        </form>

        @endif
        <div class="row">
            <div class="col-md-12">
                @if(isset($result))
                    @if($result)
                        <h1>Produto atualizado com sucesso </h1>
                    @else
                        <h1>Erro ao atualizar o produto. </h1>
                    @endif
                @endif
            </div>
        </div>
    
    </section>
@endsection