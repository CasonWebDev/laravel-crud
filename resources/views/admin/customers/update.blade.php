@extends('adminlte::page')

@section('title','Clientes')

@section('content_header')
    <h1>Alterar Cliente</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            @include('admin.includes.alerts')
            <form class="form-horizontal" method="POST" action="{{ route('customers.update',['id' => $customer->id]) }}">
                {{method_field('PATCH')}}
                {!! csrf_field() !!}
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-1">
                            <label for="nome" class="control-label">Nome</label>
                            <input type="text" class="form-control" name="name" id="nome" value="{{ $customer->name }}">
                        </div>
                        <div class="col-sm-5">
                            <label for="sobrenome" class="control-label">Sobrenome</label>
                            <input type="text" class="form-control" name="surname" id="sobrenome" value="{{ $customer->surname }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                        <label for="endereco" class="control-label">Endereço</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ $customer->address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-1">
                            <label for="cidade" class="control-label">Cidade</label>
                            <input type="text" class="form-control" name="city" id="cidade" value="{{ $customer->city }}">
                        </div>
                        <div class="col-sm-5">
                            <label for="Estado" class="control-label">Estado</label>
                            <input type="text" class="form-control" name="state" id="estado" value="{{ $customer->state }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                <a href="{{ route('customers.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-info pull-right">Salvar</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
    <!-- /.col -->
</div>
@stop