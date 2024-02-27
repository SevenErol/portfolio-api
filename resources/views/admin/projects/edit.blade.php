@extends('layouts.appauth')

@section('content')
    <div class="col-10 h-100">
        <div class="container p-3 h-100 ms_inner_menu">
            <h1 class="text-center">Aggiorna il tuo progetto</h1>
            @include('partials.error')
            <form action="{{ route('admin.projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo Progetto</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ $project->title }}">
                    @error('title')
                        <small id="titleHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="mb-3 d-flex">
                    <div class="col-2">
                        @if ($project->cover_image)
                            <img width="140" class="img-fluid" src="{{ asset('storage/' . $project->cover_image) }}"
                                alt="">
                        @else
                            <div class="placeholder p-5 bg-secondary d-flex align-items-center justify-content-center"
                                style="width:140px">Placeholder</div>
                        @endif
                    </div>
                    <div class="col-10">
                        <label for="cover_image" class="form-label">Copertina</label>
                        <input type="file" class="form-control @error('cover_image') is-invalid @enderror"
                            id="cover_image" name="cover_image" value="{{ $project->cover_image }}">
                        @error('cover_image')
                            <small id="cover_imageHlper" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label for="description">Descrzione Progetto</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description"
                        id="description" name="description" style="height: 150px">{{ $project->description }}</textarea>
                    @error('description')
                        <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="date" class="form-label">Data Progetto</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ $project->date }}">
                    @error('thumb')
                        <small id="dateHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="languages" class="form-label">Technologies</label>
                    <select multiple class="form-select form-select-sm" name="languages[]" id="languages">
                        <option value="" disabled>Select a technology</option>
                        @forelse ($languages as $language)
                            @if ($errors->any())
                                <option value="{{ $language->id }}"
                                    {{ in_array($language->id, old('languages', [])) ? 'selected' : '' }}>
                                    {{ $language->lang_name }}
                                </option>
                            @else
                                <option
                                    value="{{ $language->id }}"{{ $project->languages->contains($language->id) ? 'selected' : '' }}>
                                    {{ $language->lang_name }}
                                </option>
                            @endif
                        @empty
                            <option value="" disabled>Sorry no technologies in the system</option>
                        @endforelse
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Conferma</button>
            </form>
        </div>
    </div>
@endsection
