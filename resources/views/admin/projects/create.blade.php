@extends('layouts.app')

@section('content-header')
    <h1 class="my-3">Crea Post</h1>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary">Torna alla lista</a>
@endsection

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                Correggi i seguenti errori:

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.projects.store') }}" class="row">
            @csrf

            <div class="col-12 my-4">
                <label for="title" class="form-label ">Titolo</label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror">
            </div>


            <div class="col-12 my-4">
                <label for="type_id" class="form-label ">Tipo</label>
                <select name="type_id" id="type_id" class="@error('type_id') is-invalid @enderror">
                    <option value="100000">Non categorizzato</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 my-4">
                <div class="row">
                    @foreach ($technologies as $technology)
                        <div class="col-2">
                            <input type="checkbox" name="technologies[]" id="technologies" value="{{ $technology->id }}"
                                class="form-check-control">
                            <label for="technologies">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 mb-4">
                <label for="content" class="form-label">Contenuto</label>
                <textarea name="content" id="content" class="form-control @error('title') is-invalid @enderror" rows="5"></textarea>
            </div>

            <div class="col-12 mb-4">
                <button class="btn btn-secondary">Salva</button>
            </div>

        </form>

    </div>
@endsection
