@extends('adminlte::page')

@section('title','Clientes')

@section('content_header')
    <h1>Editar Venda</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            @include('admin.includes.alerts')
            <form class="form-horizontal" method="POST" action="{{ route('sells.update',['id' => $sells->id]) }}">
                {{method_field('PATCH')}}
                {!! csrf_field() !!}
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <label for="customer" class="control-label">Cliente</label>
                            <select name="customer_id" id="customer" class="form-control">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" @if($customer->id == $sells->customer_id) selected @endif>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="col-sm-10 col-sm-offset-1" id="app">
                        <label for="customer" class="control-label">Produtos</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 282px;">Produto</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 251px;">Categoria</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 198px;">Quantidade</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 145px;">Valor</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 145px;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $product->name }}</td>
                                                    <td>{{ $product->category->category }}</td>
                                                    <td>
                                                    <product qty="{{checkQty($sells->products,$product->id)}}" prodid="{{$product->id}}" price="{{$product->price}}" v-on:prod="addprod"></product>

                                                    <input v-model.lazy="quantity['{{$product->id}}']" name="quantity[{{$product->id}}]" value="0" type="number" class="form-control" max="{{ $product->stock + checkQty($sells->products,$product->id) }}" min="0" value="0" v-on:change="totalprod({{$product->id}}, {{$product->price}})">

                                                    </td>
                                                    <td>R$ {{ currency($product->price) }}</td>
                                                    <td v-text="price[{{$product->id}}] ? price[{{$product->id}}] : 'R$ 0,00'"></td>
                                                </tr>
                                            @endforeach                                            
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1" v-text="total ? total : 'R$ 0,00'"></th>
                                                </tr>
                                            </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <input type="hidden" name="products" v-model="fields">
                <div class="box-footer">
                <a href="{{ route('sells.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-info pull-right">Salvar</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
    <!-- /.col -->
</div>
@stop