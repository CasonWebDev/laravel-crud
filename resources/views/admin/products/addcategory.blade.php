@extends('adminlte::page')

@section('title','Clientes')

@section('content_header')
    <h1>Adicionar Categoria</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            @include('admin.includes.alerts')
            <form class="form-horizontal" method="POST" action="{{ route('categories.store') }}">
                {!! csrf_field() !!}
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <label for="category" class="control-label">Categoria</label>
                            <input type="text" class="form-control" name="category" id="category" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                <a href="{{ route('categories.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-info pull-right">Salvar</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
    <!-- /.col -->
</div>
@stop