@extends('layouts.admin')

@section('title')
    {{ $character->name }}
@endsection

@section('content')
    <div class="container text-white mt-5">
        <h1 class="text-center">{{ $character->name }}</h1>
        <div class="d-flex justify-content-between">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.characters.index') }}">Personaggi</a></li>
                <li class="breadcrumb-item active">{{ $character->name }}</li>
            </ol>
            <div>
                <a class="btn btn-primary" href="{{ route('admin.characters.edit', $character->slug) }}">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                <form class="m-0 p-0 d-inline-block" action="{{ route('admin.characters.destroy', $character->slug) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-secondary delete-button" data-item-title="{{ $character->name }}" type="submit">
                        <i class="fa-solid fa-eraser"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="row bg-dark rounded-5 py-5 px-4 ">
            <div class="box-image justify-content-center d-flex mb-5 mb-lg-0 col-12 col-lg-6">
                <img src="{{ $character->image ? $character->image : $character->type->image }}"
                    alt="{{ $character->name }}" class="object-fit-contain w-75" />
            </div>
            <div class="box-info col-12 col-lg-6">
                <h3 class="text-uppercase text-secondary d-flex justify-content-center">
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
                <div>
                    <p class="text-center text-secondary">Inventario:</p>
                    @foreach ($character->items as $item)
                        @if (!$loop->last)
                            <p>
                                <span class="fst-italic">{{ $item->name }} - </span>
                            @else
                                <span class="fst-italic">{{ $item->name }}</span>
                            </p>
                        @endif
                    @endforeach
                </div>
                <hr />
            </div>
            <p class="p-3 d-flex justify-content-between col-12 flex-column">
                <span class="text-secondary text-center fs-4 py-3 pixel-text">Descrizione</span>
                <span class="bm-desc p-3 fst-italic text-capitalize fs-6">
                    {{ $character->description }}</span>
            </p>
        </div>
    </div>
@endsection
