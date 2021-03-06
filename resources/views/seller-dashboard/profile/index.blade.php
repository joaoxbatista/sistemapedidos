@extends('template.seller-dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

    <h3>Dashboard/Perfil</h3>
    <a href="{{ route('seller.dashboard') }}" class="btn btn-default">Voltar</a><br><br>



    <div class="panel panel-default">
        <div class="panel-heading">
            Informações financeiras
        </div>

        <div class="panel-body">
            <div class="col-md-2">
                <h4>Vendas</h4>
                @if($seller->sales != null)
                    <p>{{ $seller->sales }}</p>
                @else
                    <p>Nenhuma venda efetuada</p>
                @endif
            </div>

            <div class="col-md-2">
                <h4>Pagamento</h4>
                @if($seller->payment != null)
                    <p>R$ {{ $seller->payment }}</p>
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
                    {{ Form::text('name', $seller->name, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    {{ Form::label('email', 'E-mail') }}
                    {{ Form::email('email', $seller->email, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <img width="100px" src="{{ asset('uploads/images/sellers/'.$seller->image) }}" alt=""><br><br>
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