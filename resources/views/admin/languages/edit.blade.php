@extends('layouts.appauth')

@section('content')
    <div class="col-10 h-100">
        <div class="container p-3 h-100 ms_inner_menu">
            <h1 class="text-center">Aggiorna il Linguaggio</h1>
            @include('partials.error')
            <form action="{{ route('admin.languages.update', $language->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <div class="mb-3">
                    <label for="lang_name" class="form-label">Titolo linguaggio</label>
                    <input type="text" class="form-control @error('lang_name') is-invalid @enderror" id="lang_name"
                        name="lang_name" value="{{ $language->lang_name }}">
                    @error('lang_name')
                        <small id="lang_nameHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="mb-3 d-flex">
                    <div class="col-2">
                        @if ($language->lang_image)
                            <img width="140" class="img-fluid" src="{{ asset('storage/' . $language->lang_image) }}"
                                alt="">
                        @else
                            <div class="placeholder p-5 bg-secondary d-flex align-items-center justify-content-center"
                                style="width:140px">Placeholder</div>
                        @endif
                    </div>
                    <div class="col-10">
                        <label for="lang_image" class="form-label">Immagine Linguaggio</label>
                        <input type="file" class="form-control @error('lang_image') is-invalid @enderror" id="lang_image"
                            name="lang_image" value="{{ $language->lang_image }}">
                        @error('lang_image')
                            <small id="lang_imageHlper" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label for="description">Descrizione Linguaggio</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description"
                        id="description" name="description" style="height: 150px">{{ $language->description }}</textarea>
                    @error('description')
                        <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="scope" class="form-label">Scopo Linguaggio</label>
                    <input type="text" class="form-control @error('scope') is-invalid @enderror" id="scope"
                        name="scope" value="{{ $language->scope }}">
                    @error('scope')
                        <small id="scopeHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="knowledge_level" class="form-label">Types</label>
                    <select class="form-select @error('knowledge_level') 'is-invalid' @enderror" name="knowledge_level"
                        id="knowledge_level">
                        <option value="Principiante" {{ 'Principiante' == $language->knowledge_level ? 'selected' : '' }}>
                            Principiante</option>
                        <option value="Intermedio" {{ 'Intermedio' == $language->knowledge_level ? 'selected' : '' }}>
                            Intermedio</option>
                        <option value="Avanzato" {{ 'Avanzato' == $language->knowledge_level ? 'selected' : '' }}>Avanzato
                        </option>
                        <option value="Esperto" {{ 'Esperto' == $language->knowledge_level ? 'selected' : '' }}>Esperto
                        </option>

                    </select>

                    @error('knowledge_level')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Conferma</button>
            </form>
        </div>
    </div>
@endsection
