@extends('layouts.appauth')

@section('content')
    <div class="col-10 ">
        <div class="container p-3">
            <h1 class="text-center">Aggiorna il tuo progetto</h1>
            @include('partials.error')
            <form action="{{ route('admin.projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Data title</label>
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
                        <label for="cover_image" class="form-label">Data cover image</label>
                        <input type="file" class="form-control @error('cover_image') is-invalid @enderror"
                            id="cover_image" name="cover_image" value="{{ $project->cover_image }}">
                        @error('cover_image')
                            <small id="cover_imageHlper" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label for="description">Data description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description"
                        id="description" name="description" style="height: 150px">{{ $project->description }}</textarea>
                    @error('description')
                        <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ $project->date }}">
                    @error('thumb')
                        <small id="dateHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
