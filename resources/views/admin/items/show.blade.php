@extends('layouts.admin')
@section('title')
    {{ $item->name }}
@endsection

@section('content')

<div class="container text-white mt-5">
    <h1 class="text-center">{{ $item->name }}</h1>
        <div class="d-flex justify-content-between">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.items.index') }}">Oggetti</a></li>
                <li class="breadcrumb-item active">{{ $item->name }}</li>
            </ol>
            <div>
                <a class="btn btn-primary" href="{{ route('admin.items.edit', $item->slug) }}">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                <form class="m-0 p-0 d-inline-block" action="{{ route('admin.items.destroy', $item->slug) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-secondary delete-button" data-item-title="{{ $item->name }}" type="submit">
                        <i class="fa-solid fa-eraser"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="row bg-dark justify-content-center rounded-5 py-5 px-4 ">
           <ul class="text-light list-unstyled">
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
                <li>
                    Danno: <span class="fw-bold">{{ $item['dice_num'] }} D{{ $item['dice_faces'] }}</span>
                </li>
            </ul>
        </div>
</div>
@endsection


