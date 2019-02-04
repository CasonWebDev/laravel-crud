@extends('adminlte::page')

@section('title','Clientes')

@section('content_header')
    <h1>Vendas</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ route('sells.create') }}" class="btn btn-block btn-primary"><i class="fa fa-tag"></i> Adicionar Venda</a>
                </div>
            </div>
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 297.45px;" aria-sort="ascending">Cliente</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 362.1px;">Data</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 322.167px;">Total</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 257.083px;" >Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sells as $sell)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $sell->customer->name }}</td>
                                        <td>{{ date('d/m/Y', strtotime($sell->created_at)) }}</td>
                                        <td>R$ {{ currency($sell->amount) }}</td>
                                        <td>
                                            <div class="btn-group-opt">
                                                <a href="{{ route('sells.edit', ['id' => $sell->id]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                <form action="{{ route('sells.destroy', ['id' => $sell->id]) }}" method="POST" onsubmit="return confirm('Você tem certeza disso?')">
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