@extends('template.dashboard')
@section('title') Dashboard | Perfil @endsection
@section('content')

    <a href="{{ route('dashboard.home') }}" class="btn btn-default">Voltar</a><br><br>

    {{ Form::open(['method' => 'post', 'route' => 'profile.update', 'files' => true])}}
    {{ Form::hidden('user_id', Auth::user()->id)}}
    {{ Form::hidden('id', $user->id)}}

    <!-- Informações Pessoais e Documentos -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Informações pessoais e documentos</h4>
        </div>

        <div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4">
                        {{Form::label('name', 'Nome')}}
                        {{Form::text('name', $user->name , ['class' => 'form-control', 'required'])}}
                    </div>

                </div>
                @if($user->image)
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-rounded" width="180px" src="{{ asset('uploads/images/users/'.$user->image)  }}" alt="">
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-rounded" width="180px" src="{{ asset('imgs/no-image.png')  }}" alt="">
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="form-group col-md-4">
                        {{ Form::label('file', 'Fotografia') }}
                        {{ Form::file('file', ['class' => 'form-file']) }}
                    </div>

                </div>
            </div>
        </div>
    </div><!--/ Informações Pessoais e Documentos -->

    <!-- Informaçoes de Acesso -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Informações de acesso</h4>
        </div>

        <div class="panel-body">
            <div class="form-group col-md-4">
                {{Form::label('email', 'E-mail')}}
                {{Form::text('email', $user->email , ['class' => 'form-control'])}}
            </div>
        </div>
    </div><!--/ Informaçoes de Acesso -->

    {{ Form::submit('Atualizar', ['class' => 'btn btn-success'])}}
    {{ Form::close()}}

@endsection