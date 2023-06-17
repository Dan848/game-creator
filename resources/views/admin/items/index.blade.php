@extends('layouts.admin')
@section('title')
    Oggetti
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center">Oggetti</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Oggetti</li>
        </ol>
        <div class="card text-bg-dark mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div><i class="fa-solid fa-folder-open me-1"></i>Oggetti</div>
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
    @include('partials.delete-modal')
@endsection
