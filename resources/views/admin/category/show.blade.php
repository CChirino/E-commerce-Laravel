@extends('layouts.admin')

@section('titulo','Ver Categoria')
    
@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categorias</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
    
@section('contenido')

<div id="apicategory">
  <form>
    @csrf

    @method('put')

    <span style="display:none;" id="editar">{{$editar}}</span>
    <span style="display:none;" id="nombretemp">{{$cat->name}}</span>
    <!-- Default box -->
     <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administracion de Categorias</h3>
    
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
              <label for="nombre">Nombre</label>
              <input readonly v-model="nombre" 
              @blur="getCategory" 
              @focus="div_aparecer= false"
              class="form-control" type="text" name="nombre" id="nombre">
              <label for="slug">Slug</label>
              <input readonly v-model="generarSlug" class="form-control" type="text" name="slug" id="slug">
              <!-- {{-- <div class="badge badge-danger">Slug Existente</div> --}} -->
          <div   v-if="div_aparecer" v-bind:class="div_claseslug"> @{{ div_mensajeslug }}</div>
              <br    v-if="div_aparecer">
              <label for="descripcion">Descripcion</label>
              <textarea readonly class="form-control" name="descripcion" id="descripcion" cols="30" rows="5">{{$cat->description}}</textarea>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="{{route('cancelar','admin.category.index')}}" class="btn btn-danger" >Cancelar</a>
          <a href="{{route('admin.category.edit',$cat->slug)}}" class="btn btn-warning float-right" >Editar</a>

            <br> <br>       
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->    
  </form>
</div>
@endsection