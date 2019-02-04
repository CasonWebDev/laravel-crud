@extends('adminlte::page')

@section('title','Clientes')

@section('content_header')
    <h1>Atualizar Produto</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            @include('admin.includes.alerts')
            <form class="form-horizontal" method="POST" action="{{ route('products.update',['id' => $product->id]) }}" enctype="multipart/form-data">
                {{method_field('PATCH')}}
                {!! csrf_field() !!}
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-1">
                            <label for="name" class="control-label">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                        </div>
                        <div class="col-sm-5">
                            <label for="price" class="control-label">Preço</label>
                            <input type="text" class="form-control money" name="price" id="price" value="{{ $product->price }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-1">
                            <label for="cidade" class="control-label">Categoria</label>
                            <select name="category_id" id="cidade" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($product->category->id == $category->id) selected @endif >{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <label for="estoque" class="control-label">Estoque</label>
                            <input type="text" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                        <label for="description" class="control-label">Descrição</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                        <label for="description" class="control-label">Descrição</label>
                            <input type="file" class="form-control" name="image" id="">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                <a href="{{ route('products.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-info pull-right">Salvar</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
    <!-- /.col -->
</div>
@stop