@extends('layouts.admin')
@section('title')
    Classi
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center">Classi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Classi</li>
        </ol>
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
    </div>
    @include('partials.delete-modal')
@endsection
