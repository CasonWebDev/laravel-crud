@extends('adminlte::page')

@section('title','Clientes')

@section('content_header')
    <h1>Categorias de Produtos</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ route('categories.create') }}" class="btn btn-block btn-primary"><i class="fa fa-sitemap"></i> Adicionar Categoria</a>
                </div>
            </div>
            <div class="box-body">
                @include('admin.includes.alerts')
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 297.45px;" aria-sort="ascending">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 257.083px;">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $category->category }}</td>
                                        <td>
                                            <div class="btn-group-opt">
                                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST" onsubmit="return confirm('Você tem certeza disso?')">
                                                    {{method_field('DELETE')}}
                                                    {!! csrf_field() !!}
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                                </form>
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