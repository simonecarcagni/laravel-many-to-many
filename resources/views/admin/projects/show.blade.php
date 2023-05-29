@extends('layouts.admin')

@section('page-title', $project->title)

@section('content')
    @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif
    <h1>{{ $project->title }}</h1>
    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
    @endif
    <p>{{ $project->description }}</p>
    <h5>Tipologia: {{ $project->type ? $project->type->name : 'Nessuna tipologia esistente' }}</h5>
    <a class="btn btn-danger" href="{{ route('admin.projects.index') }}">Torna alla lista</a>
@endsection
