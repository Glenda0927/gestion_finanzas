@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Crear Nuevo Usuario</h2>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="primer_nombre">Primer Nombre</label>
            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
        </div>
        <div class="form-group">
            <label for="segundo_nombre">Segundo Nombre</label>
            <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" required>
        </div>
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido</label>
            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
        </div>
        <div class="form-group">
            <label for="segundo_apellido">Segundo Apellido</label>
            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea class="form-control" id="direccion" name="direccion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection