@extends('layouts.appauth')

@section('content')
    <div class="col-10 ">
        <div class="container p-3 h-100">
            {{-- <h1 class="text-center mb-4">Gestione progetti</h1> --}}



            <h1 class="text-center mb-4">Singolo progetto</h1>

            <table class="table p-5">
                <thead>
                    <tr class="bg-light">
                        <th scope='col'>ID</th>
                        <th scope='col'>Cover image</th>
                        <th scope='col'>Title</th>
                        <th scope='col'>Description</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>
                            @if ($project->cover_image)
                                <img width="140" class="img-fluid" src="{{ asset('storage/' . $project->cover_image) }}"
                                    alt="">
                            @else
                                <div class="placeholder p-5 bg-secondary d-flex align-items-center justify-content-center"
                                    style="width:140px">Placeholder</div>
                            @endif
                        </td>
                        <td>{{ $project['title'] }}</td>
                        <td>{{ $project['description'] }}</td>
                        <td>{{ $project['date'] }}</td>
                        <td style="width:48px">
                            <div class="d-flex flex-column">
                                <div>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" type="button"
                                        class="btn border border-warning col-12 mb-3 fw-bold ms_btn_hover_warning">Edit</a>
                                </div>
                                <div>


                                    <button data-bs-toggle="modal" data-bs-target="#delete-{{ $project->id }}"
                                        class="btn border border-danger col-12 mb-3 fw-bold ms_btn_hover_danger">Delete</button>

                                    @include('partials.projects_modal')

                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
