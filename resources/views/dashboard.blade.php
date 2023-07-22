@extends('layouts.app')

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
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-2 h-100 p-3 shadow ms_menu">
                <h2 class="fs-4 px-3">
                    {{ __('Dashboard Menù') }}
                </h2>

                <ul class="m-0 p-0">
                    <li class="nav-item list-unstyled px-3 fs-5">
                        <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                    </li>
                </ul>

            </div>

            <div class="col-10 ms_col">
                cioa
            </div>
        </div>
    </div>
@endsection
