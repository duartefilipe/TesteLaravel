<!-- calendar.blade.php -->
@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                    <div class="container ">
                        <div class="row">
                        <div class="col-md-6">
                            <h3>Eventos</h3>
                        </div>
                            <div class="col-md-6 text-right">
                                <a data-toggle="modal" data-target="#modalcad"> 
                                    <span class="btn btn-primary btn-sm">
                                        <i class="fa fa-check">Novo</i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($event as $e)
                            <tr>
                                <td>
                                    {{ $e->title }}
                                </td>
                            
                                <td>
                                    <a href="/deleteEvent/{{$e->id}}" style="color: black;" >Delete</a>
                                </td>
                                <td>
                                <a data-toggle="modal" data-target="#modal-default{{$e->id}}">
                                    <span class="btn-label"><i class="fa fa-check"></i></span>Update
                                </a>
                                </td>
                                
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
                
        </div>
        
    </div> 
</div>

<!-- update modal inicio-->

<div class="modal fade" id="modal-default{{$e->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alterar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ url('/updateEvent', $e->id) }}">
                        @csrf
                        <div class="container">
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input id="" type="text"  class="form-control" name="title" value="{{ $e->title }}" require>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Data Inicio</label>
                                        <input id="" type="date" class="form-control" name="start_date" value="{{ $e->start_date }}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">Data Fim</label>
                                        <input id="" type="date" class="form-control" name="end_date" value="{{ $e->end_date }}" require>
                                    </div>  
                                </div>
                                
                            </div>
                        </div>
                   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div> </form>
    </div>
  </div>
</div>

<!--update modal fim-->

<!-- cad modal inicio-->

<div class="modal fade" id="modalcad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Novo Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                
                   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div> </form>
    </div>
  </div>
</div>

<!--cad modal fim-->


@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection
