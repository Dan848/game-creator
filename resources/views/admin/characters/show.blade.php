@extends('layouts.admin')

@section('title')
    {{ $character->name }}
@endsection

@section('content')
    <div class="container text-white mt-5">
        <h1 class="text-center">{{ $character->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.characters.index') }}">Personaggi</a></li>
            <li class="breadcrumb-item active">{{ $character->name }}</li>
        </ol>
        <div class="row bg-dark rounded-5 py-5 px-4 ">
            <div class="box-image justify-content-center d-flex mb-5 mb-lg-0 col-12 col-lg-6">
                <img src="{{ $character->image ? $character->image : $character->type->image }}"
                    alt="{{ $character->name }}" class="object-fit-contain w-75" />
            </div>
            <div class="box-info col-12 col-lg-6">
                <h3 class="text-uppercase d-flex justify-content-center">
                    Statistiche
                </h3>
                <hr />
                <p class="d-flex justify-content-between">
                    <span class="pixel-text">Forza:</span>

                    <span class="fw-bold"> {{ $character->strength }}</span>
                </p>
                <hr />
                <p class="d-flex justify-content-between">
                    <span class="pixel-text"> Difesa:</span>

                    <span class="fw-bold"> {{ $character->defence }}</span>
                </p>
                <hr />
                <p class="d-flex justify-content-between">
                    <span class="pixel-text">Intelligenza:</span>

                    <span class="fw-bold"> {{ $character->intelligence }}</span>
                </p>
                <hr />
                <p class="d-flex justify-content-between">
                    <span class="pixel-text">Velocità:</span>

                    <span class="fw-bold"> {{ $character->speed }}</span>
                </p>
                <hr />
                <p class="d-flex justify-content-between">
                    <span class="pixel-text"> Vita:</span>

                    <span class="fw-bold"> {{ $character->life }}</span>
                </p>
                <hr />
                <p class="d-flex justify-content-between">
                    <span class="pixel-text">Classe</span>
                    <span class="fw-bold">{{ $character->type->name }}</span>
                </p>
                <hr />
                <!-- IN ATTESA CHE VENGAO SEEDATI GLI ITEM -->
                <!-- <p class="d-flex justify-content-between">
                                                                                                                                                                                                                                                                                                    <span class="pixel-text"> Arma</span>
                                                                                                                                                                                                                                                                                                    <span class="fw-bold"> $character->items->name </span>
                                                                                                                                                                                                                                                                                                  </p>
                                                                                                                                                                                                                                                                                                  <hr /> -->
            </div>
            <p class="p-3 d-flex justify-content-between col-12 flex-column">
                <span class="text-secondary text-center fs-4 py-3 pixel-text">Descrizione</span>
                <span class="bm-desc p-3 fst-italic text-capitalize fs-6">
                    {{ $character->description }}</span>
            </p>
        </div>
    </div>
@endsection
