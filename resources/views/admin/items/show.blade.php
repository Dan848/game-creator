@extends('layouts.admin')

@section('title')
    {{ $item->name }}
@endsection

@section('content')
    <div class="container d-flex my-5 justify-content-center">
        <div class="info me-5">
            <h1 class="pb-3">{{ $item['name'] }}</h1>
            <ul class="text-black list-unstyled">
                <li>
                    Costo: <span class="fw-bold">{{ $item['cost'] }}</span>
                </li>
                <li>
                    Peso: <span class="fw-bold">{{ $item['weight'] }}</span>
                </li>
                <li>
                    Tipo: <span class="fw-bold">{{ $item['type'] }}</span>
                </li>
                <li>
                    Categoria: <span class="fw-bold">{{ $item['category'] }}</span>
                </li>
                <li>
                    Descrizione: <span class="fw-bold">{{ $item['description'] }}</span>
                </li>
            </ul>

            <form action="{{ route('admin.items.destroy', $item) }}" method="POST">

                @csrf
                @method('DELETE')
                <button class="delete-button btn-warning btn"><a href="{{ route('admin.items.edit', $item->id) }}"><i
                            class="fa-solid fa-pencil"></i></a>
                </button>
                <button type='submit' class="delete-button btn-danger btn" data-item-title="{{ $item->name }}"> <i
                        class="fa-solid  fa-trash"></i></button>

            </form>
        </div>
    </div>
@endsection
