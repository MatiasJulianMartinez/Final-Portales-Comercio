@extends('layout.app')

@section('title', 'Alumnos')

@section('content')
<div class="container py-5">
<div class="title pt-3 pb-5">
    <h2 class="position-relative d-inline-block ms-4">Alumnos</h2>
</div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($alumnos as $alumno)
        <div class="col">
            <div class="card h-100 text-center shadow-sm">
                <img src="{{ Storage::url('images/alumnos/' . $alumno->foto) }}" class="card-img-top rounded-circle mx-auto mt-4" alt="{{ $alumno->nombre_completo }}" style="width: 150px; height: 150px; object-fit: cover;">
                <div class="card-body">
                    <h3 class="card-title">{{ $alumno->nombre_completo }}</h3>
                    <p class="card-text text-muted"><em>Nacimiento: {{ \Carbon\Carbon::parse($alumno->nacimiento)->format('d-m-Y') }}</em></p>
                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                        @if ($alumno->mail)
                        <a href="mailto:{{ $alumno->mail }}" class="btn btn-sm bg-primary text-white ">
                            <i class="bi bi-envelope-fill"></i> Mail
                        </a>
                        @endif
                        @if ($alumno->linkedin)
                        <a href="{{ $alumno->linkedin }}" target="_blank" class="btn btn-sm bg-info text-white ">
                            <i class="bi bi-linkedin"></i> LinkedIn
                        </a>
                        @endif
                        @if ($alumno->github)
                        <a href="{{ $alumno->github }}" target="_blank" class="btn btn-sm bg-dark text-white ">
                            <i class="bi bi-github"></i> GitHub
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
