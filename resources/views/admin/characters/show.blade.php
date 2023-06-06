@extends('layouts.app')

@section('page_title')
    {{ $character['name'] }}
@endsection

@section('content')
    <div class="container d-flex my-5 justify-content-center">
        <div class="info me-5">
            <h1 class="pb-3">{{ $character['name'] }}</h1>
            <ul class="text-black list-unstyled">
                <li>
                    Attacco: <span class="fw-bold">{{ $character['attack'] }}</span>
                </li>
                <li>
                    Difesa: <span class="fw-bold">{{ $character['defence'] }}</span>
                </li>
                <li>
                    Velocità: <span class="fw-bold">{{ $character['speed'] }}</span>
                </li>
                <li>
                    Intelligenza: <span class="fw-bold">{{ $character['intelligence'] }}</span>
                </li>
                <li>
                    Vita: <span class="fw-bold">{{ $character['life'] }}</span>
                </li>
                <li>
                    Descrizione: <span class="fw-bold">{{ $character['description'] }}</span>
                </li>
            </ul>

            <form action="{{ route('admin.characters.destroy', $character) }}" method="POST">

                @csrf
                @method('DELETE')
                <button class="delete-button btn-warning btn"><a
                        href="{{ route('admin.characters.edit', $character->id) }}"><i class="fa-solid fa-pencil"></i></a>
                </button>
                <button type='submit' class="delete-button btn-danger btn" data-item-title="{{ $character->name }}"> <i
                        class="fa-solid  fa-trash"></i></button>

            </form>
        </div>

        <div class="image-character">
            <img src="https://cdn.vox-cdn.com/thumbor/TMjYvNH-wm9yE2CcRbhL6b0Sv8w=/1400x0/filters:no_upscale()/cdn.vox-cdn.com/uploads/chorus_asset/file/22701491/boh.jpg"
                alt="{{ $character['name'] }}" class="img-fluid">
        </div>
    </div>
@endsection
