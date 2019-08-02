@extends('layouts.app')

{{-- reemplazar a yield(content) por este contenido --}}
@section('content')

{{-- en esta linea agrega todo el navbar --}}
@include('partials.navbar')

    <main role="main" class="flex-shrink-0">
        <div class="container">
          <h1 class="mt-5">mis tareas</h1>
          <p><a href="{{route('tareas.create')}}">Nueva tarea</a></p>

          <div class="my-3 p-3 bg-white rounded shadow-sm">
          <h6 class="border-botton border-gray pb-2 mb-0">Pendientes</h6>  
          @if (!empty($tareas))
              @foreach ($tareas as $tarea)
              <div class="media text-muted pt-3">
                  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">{{$tarea->titulo}} - {{$tarea->descripcion}}</p>
                  <a class="btn btn-sm btn-primary" href="{{route('tareas.edit',['id'=>$tarea->id])}}">Editar</a>
                  <form action="{{route('tareas.destroy',$tarea->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
                  {{-- <p>{{$tarea->numero}}</p>
                  <p>{{$tarea->aleatorio}}</p>
                  <p>{{$tarea->imagen}}</p> --}}
                </div>
                  
              @endforeach
          @endif
        </div>
        </div>
    </main>

@endsection