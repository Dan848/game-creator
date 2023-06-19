@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</a>
        </ol>
        {{-- CHARACTERS BOARD --}}
        <div class="card text-bg-dark mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div><i class="fa-solid fa-people-group me-1"></i>Personaggi</div>
                <a class="btn btn-primary fw-medium d-flex align-items-center" href="{{ route('admin.characters.create') }}">
                    <i class="fa-regular fa-plus me-1 text-secondary fs-5 vertical-center fw-bolder"></i>Aggiungi
                </a>
            </div>
            <div class="card-body">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th class="d-none d-sm-table-cell" scope="col">Immagine</th>
                            <th class="d-none d-lg-table-cell" scope="col">Classe</th>
                            <th class="text-center" scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($characters as $character)
                            <tr class="align-middle">
                                {{-- Name --}}
                                <th scope="row">
                                    <a class="h5"
                                        href="{{ route('admin.characters.show', $character) }}">{{ $character->name }}
                                    </a>
                                </th>
                                {{-- Image --}}
                                <td class="d-none d-sm-table-cell">
                                    <img src="{{ $character->image ? $character->image : $character->type->image }}"
                                        class="d-block img-preview">
                                </td>
                                {{-- Class/Type --}}
                                <td class="d-none d-lg-table-cell">
                                    <a
                                        href="{{ route('admin.types.show', $character->type->slug) }}"class="d-block text-white img-preview">{{ $character->type->name }}</a>
                                </td>
                                {{-- Action Button --}}
                                <td>
                                    <div
                                        class="d-flex gap-2 flex-wrap justify-content-center text-center align-items-center">

                                        <a class="btn btn-success bg-gradient"
                                            href="{{ route('admin.characters.show', $character->slug) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.characters.edit', $character->slug) }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <form class="m-0 p-0 d-inline-block"
                                            action="{{ route('admin.characters.destroy', $character->slug) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-secondary delete-button"
                                                data-item-title="{{ $character->name }}" type="submit">
                                                <i class="fa-solid fa-eraser"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $characters->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
        {{-- CLASSES/TYPES BOARD --}}
        <div class="card text-bg-dark mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div><i class="fa-solid fa-hat-wizard me-1"></i>Classi</div>
                <a class="btn btn-primary fw-medium d-flex align-items-center" href="{{ route('admin.types.create') }}">
                    <i class="fa-regular fa-plus me-1 text-secondary fs-5 vertical-center fw-bolder"></i>Aggiungi
                </a>
            </div>
            <div class="card-body">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th class="d-none d-sm-table-cell" scope="col">Immagine</th>
                            <th class="d-none text-center d-sm-table-cell" scope="col">Personaggi</th>
                            <th class="text-center" scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr class="align-middle">
                                {{-- Name --}}
                                <th scope="row">
                                    <a class="h5" href="{{ route('admin.types.show', $type) }}">{{ $type->name }}
                                    </a>
                                </th>
                                {{-- Image --}}
                                <td class="d-none d-sm-table-cell">
                                    <img class="d-block img-preview" src="{{ $type->image }}">
                                </td>
                                {{-- PG With this class --}}
                                <td class="d-none d-sm-table-cell text-center">{{ $type->characters->count() }}
                                </td>
                                {{-- Action Button --}}
                                <td>
                                    <div
                                        class="d-flex gap-2 flex-wrap justify-content-center text-center align-items-center">

                                        <a class="btn btn-success bg-gradient"
                                            href="{{ route('admin.types.show', $type->slug) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a class="btn btn-primary" href="{{ route('admin.types.edit', $type->slug) }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <form class="m-0 p-0 d-inline-block"
                                            action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-secondary delete-button"
                                                data-item-title="{{ $type->name }}" type="submit">
                                                <i class="fa-solid fa-eraser"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $types->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
        {{-- ITEMS BOARD --}}
        <div class="card text-bg-dark mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div><i class="fa-solid fa-coins me-1"></i>Oggetti</div>
                <a class="btn btn-primary fw-medium d-flex align-items-center" href="{{ route('admin.items.create') }}">
                    <i class="fa-regular fa-plus me-1 text-secondary fs-5 vertical-center fw-bolder"></i>Aggiungi
                </a>
            </div>
            <div class="card-body">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th class="d-none d-sm-table-cell" scope="col">Tipo</th>
                            <th class="d-none d-lg-table-cell" scope="col">Peso</th>
                            <th class="text-center" scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="align-middle">
                                {{-- Name --}}
                                <th scope="row">
                                    <a class="h5" href="{{ route('admin.items.show', $item) }}">{{ $item->name }}
                                    </a>
                                </th>
                                {{-- Type --}}
                                <td class="d-none d-sm-table-cell">
                                    <a class="d-block text-white">{{ $item->type }}</a>
                                </td>
                                {{-- Peso --}}
                                <td class="d-none d-lg-table-cell">{{ $item->weight }}</td>
                                {{-- Action Button --}}
                                <td>
                                    <div
                                        class="d-flex gap-2 flex-wrap justify-content-center text-center align-items-center">

                                        <a class="btn btn-success bg-gradient"
                                            href="{{ route('admin.items.show', $item->slug) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a class="btn btn-primary" href="{{ route('admin.items.edit', $item->slug) }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <form class="m-0 p-0 d-inline-block"
                                            action="{{ route('admin.items.destroy', $item->slug) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-secondary delete-button"
                                                data-item-title="{{ $item->name }}" type="submit">
                                                <i class="fa-solid fa-eraser"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $items->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
