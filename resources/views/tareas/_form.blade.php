@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">* {{$error}}</p>

    @endforeach
@endif
<form action="{{$action}}" method="POST" class="col-md-12 col-12">
    <div class="row">
        {{ csrf_field() }}
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required="required" value="{{$tarea->titulo}}">

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="col-6">
                                <label for="">Prioridad</label>
                                <select name="prioridad_id" id="prioridad_id" class="form-control">
                                    <option value="0">selecciona</option>
                                    @if (!empty($prioridades))
                                        @foreach ($prioridades as $p)
                                            <option value="{{$p->id}}" {{$p->id ===$tarea->prioridad_id ? 'select' : ''}}>{{$p->prioridad}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                            
                        </div>
                        <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <span class="text-danger">*&nbsp;</span><label for="">Descripcion</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control">{{$tarea->descripcion}}</textarea>
                                    </div>        
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-3 col-3">
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </div>
                        </div>
                        @if (!empty($put))
                            <input type="hidden" name="_method" value="PUT">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>