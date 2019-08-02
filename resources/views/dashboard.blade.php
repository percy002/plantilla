@extends('layouts.app')

{{-- reemplazar a yield(content) por este contenido --}}
@section('content')

{{-- en esta linea agrega todo el navbar --}}
@include('partials.navbar')

    <main role="main" class="flex-shrink-0">
        <div class="container">
          <h1 class="mt-5">comandos de php artisan</h1>
          @if (!empty($like))
              @foreach ($like as $l)
                  <p>{{$l->nombre}} - {{$l->correo}}</p>
                  <p>{{$l->numero}}</p>
                  <p>{{$l->aleatorio}}</p>
                  <p>{{$l->imagen}}</p>
                  <img src="{{$l->imagen}}" alt="">
              @endforeach
          @endif
        </div>
    </main>

@include('partials.footer')
@endsection