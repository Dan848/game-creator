@extends('layouts.admin')

@section('title')
    {{ $type->name }}
@endsection

@section('content')
    <div class="container d-flex my-5 justify-content-center">
        <div class="info me-5">
            <h1 class="pb-3">{{ $type['name'] }}</h1>
            <ul class="text-black list-unstyled">
                <li>
                    Descrizione: <span class="fw-bold">{{ $type['description'] }}</span>
                </li>
            </ul>

            <form action="{{ route('admin.types.destroy', $type) }}" method="POST">

                @csrf
                @method('DELETE')
                <button class="delete-button btn-warning btn"><a href="{{ route('admin.types.edit', $type->id) }}"><i
                            class="fa-solid fa-pencil"></i></a>
                </button>
                <button type='submit' class="delete-button btn-danger btn" data-item-title="{{ $type->name }}"> <i
                        class="fa-solid  fa-trash"></i></button>

            </form>
        </div>
        <div class="image-character-show">

            <img src="https://cdn.vox-cdn.com/thumbor/TMjYvNH-wm9yE2CcRbhL6b0Sv8w=/1400x0/filters:no_upscale()/cdn.vox-cdn.com/uploads/chorus_asset/file/22701491/boh.jpg"
                alt="{{ $type['name'] }}" class="img-fluid">
        </div>
    </div>
@endsection
