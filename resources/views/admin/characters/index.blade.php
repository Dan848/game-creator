@extends('layouts.admin')
@section('title')
    Personaggi
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center">Personaggi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Personaggi</li>
        </ol>
        <div class="card text-bg-dark mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div><i class="fa-solid fa-folder-open me-1"></i>Personaggi</div>
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
                                    <a class="d-block text-white img-preview">{{ $character->type->name }}</a>
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
    </div>
    @include('partials.delete-modal')
@endsection
