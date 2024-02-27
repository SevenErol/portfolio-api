@extends('layouts.appauth')

@section('content')
    <div class="col-10 h-100">
        <div class="container p-3 h-100 ms_inner_menu">


            <h1 class="text-center">Form per un nuovo Progetto</h1>
            @include('partials.error')
            <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo Progetto</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}">
                    @error('title')
                        <small id="titleHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Copertina</label>
                    <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"
                        name="cover_image" value="{{ old('cover_image') }}">
                    @error('cover_image')
                        <small id="cover_imageHlper" class="text-danger">{{ $message }} </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Descrizione Progetto</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Inserisci una Descrizione"
                        id="description" name="description" style="height: 150px">{{ old('description') }}</textarea>
                    @error('description')
                        <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Data Progetto</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ old('date') }}">
                    @error('thumb')
                        <small id="dateHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="languages" class="form-label">Linguaggi progetto</label>
                    <select multiple class="form-select form-select-sm" name="languages[]" id="languages">
                        <option value="" disabled>Select a technology</option>
                        @forelse ($languages as $language)
                            @if ($errors->any())
                                <option value="{{ $language->id }}"
                                    {{ $language->lang_name == old('languages[]') ? 'selected' : '' }}>
                                    {{ $language->lang_name }}</option>
                            @else
                                <option value="{{ $language->id }}">{{ $language->lang_name }}</option>
                            @endif
                        @empty
                            <option value="" disabled>Sorry no languages in the system</option>
                        @endforelse
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Inserisci</button>
            </form>
        </div>
    </div>
@endsection
