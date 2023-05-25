@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col">Numero di Progetti</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($types as $type)
                <tr>
                    <th>{{ $type->id }}</th>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->slug }}</td>
                    <td>{{ count($type->projects) }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
