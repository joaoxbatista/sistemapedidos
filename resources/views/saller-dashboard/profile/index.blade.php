@extends('template.saller-dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

    <h3>Dashboard/Perfil</h3>
    <a href="{{ route('saller.dashboard') }}" class="btn btn-default">Voltar</a><br><br>

    @if($saller->image != null)
        <img src="{{$saller->image}}" alt="{{$saller->name}}">
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Informações financeiras
        </div>

        <div class="panel-body">
            <div class="col-md-2">
                <h4>Vendas</h4>
                @if($saller->sales != null)
                    <p>{{ $saller->sales }}</p>
                @else
                    <p>Nenhuma venda efetuada</p>
                @endif
            </div>

            <div class="col-md-2">
                <h4>Pagamento</h4>
                @if($saller->payment != null)
                    <p>R$ {{ $saller->payment }}</p>
                @else
                    <p>Pagamento não definido</p>
                @endif
            </div>
        </div>
    </div>

    <div class="panel panel-default" id="perfil-contact">
        <div class="panel-heading">
            Informações da Conta
        </div>
        <div class="panel-body">
            {{ Form::open() }}
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('name', 'Nome') }}
                    {{ Form::text('name', $saller->name, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    {{ Form::label('email', 'E-mail') }}
                    {{ Form::email('email', $saller->email, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('image', 'Imagem de perfil') }}
                    {{ Form::file('file', ['class' => 'form-file']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    {{ Form::button('<i class="fa fa-refresh"></i> Atualizar', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>





@endsection