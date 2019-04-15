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
                                        <label for="start_date">Data Inicio</label>
                                        <input id="start_date" type="date" class="form-control" name="start_date" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">Data Fim</label>
                                        <input id="end_date" type="date" class="form-control" name="end_date" >
                                    </div>  
                                </div>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                     Registrar Evento
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
