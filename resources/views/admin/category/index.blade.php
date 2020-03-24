@extends('layouts.admin')

@section('titulo','Administracion de Categorias')
    
@section('contenido')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title p-2">Seccion de Categorias</h3> 

          <span class="pl-2"> 
            <td><a class="btn btn-success" href="{{ route('admin.category.create') }}"> <i class="fas fa-plus-circle"></i> Crear</a></td>    
          </span>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Descripcion</th>
                <th>Fecha de Creacion</th>
                <th>Fecha de Modificacion</th>
                <th colspan="3" > Transacciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach($category as $categories)
                <tr>
                <td>{{$categories->id}}</td>
                <td>{{$categories->name}}</td>
                <td>{{$categories->slug}}</td>
                <td>{{$categories->description}}</td>
                <td>{{$categories->created_at}}</td>
                <td>{{$categories->updated_at}}</td>

                <td><a class="btn btn-info" href="{{ route('admin.category.show',$categories->slug) }}"> <i class="far fa-eye"></i> Ver</a></td>
                <td><a class="btn btn-warning" href="{{ route('admin.category.edit',$categories->slug) }}"> <i class="far fa-edit"></i> Editar</a></td>
                <td><a class="btn btn-danger" href="{{ route('admin.category.index') }}"> <i class="fas fa-trash"></i> Eliminar</a></td>

                </tr>                    
                @endforeach
            </tbody>
          </table>
          
        </div>
        <!-- /.card-body -->
    </div>
    {{$category->links()}} 
      <!-- /.card -->
    </div>
  </div>
@endsection