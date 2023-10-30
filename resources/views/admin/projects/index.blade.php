@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content-header')
    <h1 class="my-3">Lista post</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-primary">Crea Nuovo elemento</a>
@endsection


@section('content')
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Tecnologia</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->type?->name }}</td>
                        <td>
                            @foreach ($project->technologies as $technology)
                                {{ $technology->name }}
                            @endforeach
                        </td>
                        <td>{{ $project->content }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->created_at }}</td>

                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="mx-2">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="mx-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="mx-2 text-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $project->id }}">
                                <i class="fa-solid
                                fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                @empty
                    <td colspan="6"><i>Non ci sono risultati</i></td>
                @endforelse
            </tbody>
        </table>
        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection

@section('modals')
    @foreach ($projects as $project)
        <div class="modal fade" id="deleteModal-{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma Eliminazione</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Sicuro di voler eliminare: {{ $project->title }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
