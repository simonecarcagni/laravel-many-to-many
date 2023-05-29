@extends('layouts.admin')

@section('page-title')
    Modifica il tuo progetto
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-Invalid @enderror" id="title" name="title"
                value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror


        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control @error('link') is-Invalid @enderror" id="link" name="link"
                value="{{ old('link', $project->link) }}">
            @error('link')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="project_date" class="form-label">Data</label>
            <input type="text" class="form-control @error('project_date') is-Invalid @enderror" id="project_date"
                name="project_date" value="{{ old('project_date', $project->project_date) }}">
            @error('project_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            @if ($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
            @endif
            <input type="file" class="form-control @error('image') is-Invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <select name="type_id" id="type_id" class="form-select @error('type_id') is-Invalid @enderror">
                <option @selected(old('type_id', $project->type_id) == '') value="">Scegli una tipologia</option>
                @foreach ($types as $type)
                    <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Tecnologie</label>
            <br>
            @foreach ($technologies as $technology)
                <div class="btn-group" role="group">
                    @if ($errors->any())
                        <input type="checkbox" class="btn-check" name="technologies[]"
                            id="technology_{{ $technology->id }}" value="{{ $technology->id }}"
                            @if (in_array($technology->id, old('technologies', []))) checked @endif>
                    @else
                        <input type="checkbox" class="btn-check" name="technologies[]"
                            id="technology_{{ $technology->id }}" value="{{ $technology->id }}"
                            @if ($project->technologies->contains($technology->id)) checked @endif>
                    @endif
                    <label class="btn btn-outline-dark"
                        for="technology_{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
            @endforeach

            @error('technologies')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label @error('description') is-Invalid @enderror">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                {{ old('description', $project->description) }}
            </textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Invia</button>

    </form>
@endsection
