@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col">Numero di tecnologie</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($technologies as $technology)
                <tr>
                    <th>{{ $technology->id }}</th>
                    <td>{{ $technology->name }}</td>
                    <td>{{ $technology->slug }}</td>
                    <td>{{ count($technology->projects) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
