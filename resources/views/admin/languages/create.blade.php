@extends('layouts.appauth')

@section('content')
    <div class="col-10 h-100">
        <div class="container p-3 h-100 ms_inner_menu">


            <h1 class="text-center">Compila il form per aggiungere un nuovo Linguaggio</h1>
            @include('partials.error')
            <form action="{{ route('admin.languages.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="lang_name" class="form-label">Nome Linguaggio</label>
                    <input type="text" class="form-control @error('lang_name') is-invalid @enderror" id="lang_name"
                        name="lang_name" value="{{ old('lang_name') }}">
                    @error('lang_name')
                        <small id="lang_nameHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lang_image" class="form-label">Immagine Linguaggio</label>
                    <input type="file" class="form-control @error('lang_image') is-invalid @enderror" id="lang_image"
                        name="lang_image" value="{{ old('lang_image') }}">
                    @error('lang_image')
                        <small id="lang_imageHlper" class="text-danger">{{ $message }} </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Descrizione Linguaggio</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Inserisci una descrizione..."
                        id="description" name="description" style="height: 150px">{{ old('description') }}</textarea>
                    @error('description')
                        <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="scope" class="form-label">Utilizzo</label>
                    <input type="scope" class="form-control @error('scope') is-invalid @enderror" id="scope"
                        name="scope" value="{{ old('scope') }}">
                    @error('scope')
                        <small id="scopeHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="knowledge_level" class="form-label">Livello di conoscenza:</label>

                    <select class="form-select form-control @error('knowledge_level') is-invalid @enderror"
                        name="knowledge_level" id="knowledge_level">
                        <option>Principiante</option>
                        <option>Intermedio</option>
                        <option>Avanzato</option>
                        <option>Esperto</option>
                    </select>

                    @error('knowledge_level')
                        <small id="knowledge_levelHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>



        </div>
    </div>
@endsection
