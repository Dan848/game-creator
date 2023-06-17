@extends('layouts.admin')

@section('title')
    Modifica {{ $item->name }}
@endsection

@section('content')
    <div class="container mb-5">
        <h2 class="mt-5 mb-4 text-center">
            Modifica {{ $item->name }}
        </h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.items.index') }}">Oggetti</a></li>
            <li class="breadcrumb-item active">Modifica {{ $item->name }}</li>
        </ol>
    </div>
    <div class="container p-4 bg-dark rounded-2 mb-4">
        <div class="row">
            <div class="col">
                <form class="container form-crud" method="POST" action="{{ route('admin.items.update', $item) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    {{-- Errors Section --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            @error('name')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('category')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('description')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('description')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('description')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('description')
                                <p>*{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                    <!-- NAME/IMAGE -->
                    <div class="row">
                        <!-- NAME -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $item->name }}" required autofocus>
                                <label for="name">Nome</label>
                            </div>
                        </div>
                        <!-- CATEGORY -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="category" type="text"
                                    class="form-control @error('category') is-invalid @enderror" name="category"
                                    value="{{ $item->category }}" autofocus>
                                <label class="mb-5" for="category">Categoria</label>
                            </div>
                        </div>
                    </div>
                    <!-- WEIGHT/COST/TYPE -->
                    <div class="row">
                        <!-- WEIGHT -->
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input id="weight" type="number"
                                    class="form-control @error('weight') is-invalid @enderror" name="weight"
                                    value="{{ $item->weight }}" autofocus>
                                <label for="weight">Peso</label>
                            </div>
                        </div>
                        <!-- COST -->
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input id="cost" name="cost" type="number"
                                    class="form-control @error('cost') is-invalid @enderror" value="{{ $item->cost }}"
                                    autofocus>
                                <label class="mb-5" for="cost">Cost</label>
                            </div>
                        </div>
                        <!-- TYPE -->
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input id="type" name="type" type="text"
                                    class="form-control @error('type') is-invalid @enderror" value="{{ $item->type }}"
                                    autofocus>
                                <label class="mb-5" for="type">Tipo</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                            rows="5">{{ $item->description }}</textarea>
                        <label for="description">Descrizione</label>
                    </div>
                    <!-- SAVE & RESET -->
                    <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                        <button class="btn btn-secondary me-2" type="reset">Reset</button>
                        <button class="btn btn-primary ms-2" type="submit">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
