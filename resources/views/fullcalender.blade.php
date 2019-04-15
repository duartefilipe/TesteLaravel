<!-- calendar.blade.php -->
@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')
<div class="container">

    <div class="row ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"> <a class="nav-link" href="home">Inicio </a></li>
                        <li class="nav-item active"> <a class="nav-link" href="events">Calendario </a></li>
                        <!--<li class="nav-item "> <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Cadastrar </a>
                            <a  href="{{ route('register') }}">{{ __('Register') }}</a></li>-->
                    </ul>
                </div>
            </nav>
        
    </div>
    
    <br><br>

    <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="container text-center">
                <h2>Registrar Evento</h2>
            </div>

                    <form method="POST" action="{{ url('/createEvent')}}">
                        @csrf
                        <div class="container">
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input id="title" type="text"  class="form-control" name="title" >
                            </div>
                        </div>

                        

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="created_at">Data Inicio</label>
                                        <input id="created_at" type="date" class="form-control" name="created_at" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="updated_at">Data Fim</label>
                                        <input id="updated_at" type="date" class="form-control" name="updated_at" >
                                    </div>  
                                </div>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <!--{{ __('Register') }}--> Registrar Evento
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div> 


</div>
@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection
