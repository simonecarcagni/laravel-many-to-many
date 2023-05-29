@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Link</th>
                <th scope="col">Immagine</th>
                <th scope="col">Data</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Tecnologie</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($projects as $project)
                <tr>
                    <th>{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <th>{{ $project->link }}</th>
                    <td>
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                        @endif
                    </td>
                    <td>{{ $project->project_date }}</td>
                    <td>{{ $project->type ? $project->type->name : 'Nessuna tipologia' }}</td>
                    <td>
                        @foreach ($project->technologies as $technology)
                            <span class="badge rounded-pill text-bg-info">{{ $technology->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.projects.show', $project->slug) }}">Vista</a>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">Modifica</a>
                    </td>
                    <td>
                        <form class="form_delete_project"
                            action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Confermi di voler eliminare l'elemento selezionato?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Conferma eliminazione</button>
                </div>
            </div>
        </div>
    </div>
@endsection
