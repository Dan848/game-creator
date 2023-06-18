@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="my-4">
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

                        <div>
                            <a href="{{ route('admin.characters.index') }}">Lista Personaggi</a>
                        </div>
                        <div>
                            <a href="{{ route('admin.types.index') }}">Lista Classi</a>
                        </div>
                        <div>
                            <a href="{{ route('admin.items.index') }}">Lista Oggetti</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
