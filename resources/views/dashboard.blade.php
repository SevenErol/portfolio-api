@extends('layouts.appauth')

@section('content')
    {{-- <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-10 ms_col">

        <div class="container-fluid d-flex align-items-center h-100 justify-content-center">
            <div class="row">
                <h1>Homepage per i tuoi progetti</h1>
            </div>
        </div>

    </div>
@endsection
