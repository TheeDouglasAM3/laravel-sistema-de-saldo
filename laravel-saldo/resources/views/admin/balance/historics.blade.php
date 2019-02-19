@extends('adminlte::page')

@section('title', 'Histórico de Movimentações')

@section('content_header')
    <h1>Histórico de movimentações</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Histórico</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            
        </div>
        <div class="box-body">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>Sender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historics as $his)
                        <tr>
                            <td>{{ $his->id }}</td>
                            <td>{{ number_format($his->amount, 2, ',', '.') }}</td>
                            <td>{{ $his->types($his->type) }}</td>
                            <td>{{ $his->date }}</td>
                            <td>
                                @if($his->user_id_transaction)
                                    {{ $his->userSender->name  }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $historics->links() !!}
        </div>
    </div>
@stop