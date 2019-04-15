@extends('layouts.app')

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
    
    <div class="panel-body">
        {!! $calendar->calendar() !!}
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection