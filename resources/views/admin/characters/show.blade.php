@extends('layouts.admin')

@section('title')
    {{ $character->name }}
@endsection

@section('content')
    <div class="container text-white mt-5">
        <div class="box-character row">
            <div class="box-image justify-content-center d-flex mb-5 mb-lg-0 col-12 col-lg-6">
                <img src="{{ $character->image ? $character->image : $character->type->image }}" alt="{{ $character->name }}"
                    class="object-fit-contain w-75" />
            </div>
            <div class="box-info col-12 col-lg-6">
                <h2 class="text-uppercase d-flex justify-content-center">
                    {{ $character->name }}
                </h2>
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
                <span class="bm-desc p-3 fw-bold text-capitalize fs-6">{{ $character->description }}</span>
            </p>
        </div>

        <div class="d-flex justify-content-start w-100 mt-4 ms-5">
            <a class="btn btn-primary text-decoration-none text-center" href="{{ route('admin.characters.index') }}">
                <i class="fa-sharp fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>
@endsection
