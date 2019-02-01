@extends('adminlte::page')

@section('title','Clientes')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="btn-group">
                    <button type="button" class="btn btn-block btn-primary"><i class="fa fa-cube"></i> Adicionar Produto</button>
                </div>
            </div>
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 297.45px;" aria-sort="ascending">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 362.1px;">Categoria</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 322.167px;">Preço</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 257.083px;" >Estoque</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 257.083px;" >Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $product->name }}</td>
                                        <td>{{ $product->category->category }}</td>
                                        <td>R$ {{ currency($product->price) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@stop