@extends('adminlte::page')

@section('title', 'Transferir Saldo')

@section('content_header')
    <h1>Fazer Transferência</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Transferir</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Transferir Saldo (Informe o recebedor)</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('confirm.transfer') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="sender" class="form-control" placeholder="Nome completo ou email da pessoa que irá receber o saldo">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Próxima Etapa</button>
                </div>
            </form>
        </div>
    </div>
@stop