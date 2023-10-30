@extends('layouts.app')


@section('content-header')
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary">Torna alla lista</a>
    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline-primary">Modifica elemento</a>
    <h1 class="my-3">{{ $project->title }}</h1>
@endsection



@section('content')
    <div class="container mt-5">
        <div class="row g-5 mt-3">
            <div class="col-3">
                <p>
                    <strong>Tipo</strong><br>
                    {{ $project->type?->name }}
                </p>
            </div>
            <div class="col-3">
                <p>
                    <strong>Slug</strong><br>
                    {{ $project->slug }}
                </p>
            </div>
            <div class="col-3">
                <p>
                    <strong>Created At</strong><br>
                    {{ $project->created_at }}
                </p>
            </div>
            <div class="col-3">
                <strong>Tecnologie</strong><br>
                @foreach ($project->technologies as $technology)
                    {{ $technology->name }}
                @endforeach
            </div>

            <div class="col-3">
                <p>
                    <strong>Updated At</strong><br>
                    {{ $project->updated_at }}
                </p>
            </div>
            <div class="col-12">
                <p>
                    <strong>Content</strong><br>
                    {{ $project->content }}
                </p>
            </div>
        </div>

    </div>
@endsection
