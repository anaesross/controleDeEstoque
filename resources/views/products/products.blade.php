@extends('layouts.app')

@section('content')

    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-5">Produtos</h1>
            </div>
            <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Número registro</th>
                        <th scope="col">Nome</th>                        
                        <th scope="col">Descrição</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Criado em</th>
                        <th scope="col">Última Atualização</th>
                        <th scope="col">Ações</th>                        
                    </tr>
                </thead>
                <tbody>
                @foreach($listProducts as $product)
                    <tr class="text-center">
                        <th scope="row">{{ $product->id}}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>R$ {{ $product->price }}</td>
                        <td>id usuário</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm" href="/produtos/atualizar/{{ $product->id }}">Atualizar</a>
                            <a class="btn btn-outline-danger btn-sm" href="/produtos/deletar/{{ $product->id }}">Deletar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            </div>
        </div>
    
    </section>
@endsection