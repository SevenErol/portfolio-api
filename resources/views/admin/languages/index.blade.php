@extends('layouts.appauth')

@section('content')
    <div class="col-10 h-100">
        <div class="container p-3 h-100 ms_inner_menu">
            {{-- <h1 class="text-center mb-4">Gestione progetti</h1> --}}

            <table class="table p-5">
                <div
                    class="row justify-content-between p-3 m-0 border-bottom border-dark align-items-center ms_inner_header">
                    <div class="col-2"><strong>Lista linguaggi</strong></div>
                    <div class="col-2 text-end"><a href="{{ route('admin.languages.create') }}" type="button"
                            class="btn btn-success">Nuovo linguaggio</a></div>
                </div>

                @include ('partials.message')
                @if (!$languages->isEmpty())
                    <thead>
                        <tr class="bg-light">
                            <th scope="col">ID</th>
                            <th scope="col">Copertina Linguaggio</th>
                            <th scope="col">Nome Linguaggio</th>
                            <th scope="col">Scopo</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Livello di conoscenza</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $language)
                            <tr>
                                <th scope="row">{{ $language->id }}</th>
                                <td>
                                    @if ($language->lang_image)
                                        <img width="140" class="img-fluid"
                                            src="{{ asset('storage/' . $language->lang_image) }}" alt="">
                                    @else
                                        <div class="placeholder p-5 bg-secondary d-flex align-items-center justify-content-center"
                                            style="width:140px">Placeholder</div>
                                    @endif
                                </td>
                                <td>{{ $language->lang_name }}</td>
                                <td>{{ $language->scope }}</td>
                                <td>{{ Str::of($language->description)->limit(40) }}</td>
                                <td>{{ $language->knowledge_level }}</td>
                                <td style="width:48px">
                                    <div class="d-flex flex-column">
                                        <div>
                                            <a href="{{ route('admin.languages.show', $language->id) }}" type="button"
                                                class="btn border border-primary col-12 mb-3 fw-bold ms_btn_hover_info">View</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.languages.edit', $language->id) }}" type="button"
                                                class="btn border border-warning col-12 mb-3 fw-bold ms_btn_hover_warning">Edit</a>
                                        </div>
                                        <div>

                                            <button data-bs-toggle="modal" data-bs-target="#delete-{{ $language->id }}"
                                                class="btn border border-danger col-12 mb-3 fw-bold ms_btn_hover_danger">Delete</button>

                                            @include('partials.languages_modal')

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                @else
                    <div class="container-fluid d-flex align-items-center justify-content-center ms_inner_menu">
                        <div class="row align-items-center">
                            <h1>Benvenuto nei tuoi linguaggi</h1>
                        </div>
                    </div>
                @endif
            </table>
            <div class="row">{{ $languages->links() }}</div>
        </div>
    </div>
@endsection
