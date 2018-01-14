@extends('templates.admin-dashboard')
@section('title') Perfil @endsection
@section('content')




<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Atualizar Perfil</h4>
                </div>
                <div class="content">
                    {{ Form::open(['method' => 'post', 'route' => 'admin-dashboard.profile.update', 'files' => true])}}
                    {{ Form::hidden('user_id', Auth::user()->id)}}
                    {{ Form::hidden('id', $user->id)}}
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    {{Form::label('name', 'Nome')}}
                                    {{Form::text('name', $user->name , ['class' => 'form-control', 'required'])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('email', 'E-mail')}}
                                    {{Form::text('email', $user->email , ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('file', 'Fotografia') }}
                                    {{ Form::file('file', ['class' => 'form-file']) }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-info btn-fill">Atualizar Perfil</button>
                            </div>
                        </div>

                        
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <hb-profile :user="{{$user}}"></hb-profile>
        </div>

    </div>
</div>
@endsection