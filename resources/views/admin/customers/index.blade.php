@extends('adminlte::page')

@section('title','Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="btn-group">
                    <button type="button" class="btn btn-block btn-primary"><i class="fa fa-user"></i> Adicionar Cliente</button>
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
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 362.1px;">Sobrenome</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 322.167px;">Endereço</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 257.083px;" >Cidade</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 188.2px;">Estado</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 188.2px;">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $customer->name }}</td>
                                        <td>{{ $customer->surname }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->city }}</td>
                                        <td>{{ $customer->state }}</td>
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