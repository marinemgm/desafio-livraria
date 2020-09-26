@extends('adminlte::page')

@section('title', 'Formulário de Livro')

@section('content_header')
    <h1>Formulário de Livro</h1>
@stop

@section('content')
    <div class="card card-primary">
        @if (isset($livro))
            {!! Form::model($livro, ['url' => route('restrito.livro.update', $livro), 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('restrito.livro.store')]) !!}
        @endif
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
                    @error('nome')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('restrito.livro.index', 'Voltar', null, ['class' => 'btn btn-secondary']) !!}
            </div>
        {!! Form::close() !!}
    </div>

@stop

@section('css')
@stop

@section('js')
    <script>
        $('#select-autor')select2({
            placehouder: 'Lista de autores',
            multeple: true,
            ajax:{
                url: '{{ router('restrito.lista.autores') }}',
                dataType: "json",
                data: function (params){
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function(response){
                    return{
                        resuts: response
                    };
                },
            }
        });
    </script>
@stop 