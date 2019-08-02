@extends('layouts.app')

{{-- reemplazar a yield(content) por este contenido --}}
@section('content')

{{-- en esta linea agrega todo el navbar --}}
@include('partials.navbar')

    <main role="main" class="flex-shrink-0">
        <div class="container">
          <h1 class="mt-5">mis tareas</h1>
          <a href="{{route('tareas.index')}}">Regresar</a>
          {{-- @if (!empty($tareas))
              @foreach ($tareas as $tarea)
                  <p>{{$tarea->titulo}} - {{$tarea->descripcion}}</p>
                  
                  
              @endforeach
          @endif --}}

        <section class="content">
            <h4>Actualizar</h4>
                @include('tareas._form')
        </section>
        </div>
    </main>

@endsection