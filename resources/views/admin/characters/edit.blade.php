@extends('layouts.admin')

@section('title')
    Modifica {{ $character->name }}
@endsection

@section('content')
    <div class="container mb-5">
        <h2 class="mt-5 mb-4 text-center">
            Modifica {{ $character->name }}
        </h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.characters.index') }}">Personaggi</a></li>
            <li class="breadcrumb-item active">Modifica {{ $character->name }}</li>
        </ol>
    </div>

    <div class="container p-4 bg-dark rounded-2 mb-4">
        <div class="row">
            <div class="col">
                <form class="container form-crud" method="POST" action="{{ route('admin.characters.update', $character) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    {{-- Errors Section --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            @error('name')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('image')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('strength')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('description')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('intelligence')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('defence')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('speed')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('life')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('type_id')
                                <p>*{{ $message }}</p>
                            @enderror
                            @error('item[]')
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
                                    value="{{ $character->name }}" required autofocus>
                                <label for="name">Nome</label>
                            </div>
                        </div>
                        <!-- IMAGE -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="image" type="file"
                                    class="form-control @error('image') is-invalid @enderror" name="image" autofocus>
                                <label class="mb-5" for="image">Immagine</label>
                            </div>
                        </div>
                    </div>
                    <!-- STRENGTH/INTELLIGENCE -->
                    <div class="row">
                        <!-- STRENGTH -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="strength" type="number"
                                    class="form-control @error('strength') is-invalid @enderror" name="strength"
                                    value="{{ $character->strength }}" required autofocus>
                                <label for="strength">Forza</label>
                            </div>
                        </div>
                        <!-- INTELLIGENCE -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="intelligence" type="number"
                                    class="form-control @error('intelligence') is-invalid @enderror" name="intelligence"
                                    value="{{ $character->intelligence }}" autofocus>
                                <label class="mb-5" for="intelligence">Intelligenza</label>
                            </div>
                        </div>
                    </div>
                    <!-- DEFENCE/SPEED -->
                    <div class="row">
                        <!-- DEFENCE -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="defence" type="number"
                                    class="form-control @error('defence') is-invalid @enderror" name="defence"
                                    value="{{ $character->defence }}" required autofocus>
                                <label for="defence">Difesa</label>
                            </div>
                        </div>
                        <!-- SPEED -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="speed" type="number"
                                    class="form-control @error('speed') is-invalid @enderror" name="speed"
                                    value="{{ $character->speed }}" autofocus>
                                <label class="mb-5" for="speed">Velocità</label>
                            </div>
                        </div>
                    </div>
                    <!-- LIFE/CLASS-TYPE -->
                    <div class="row">
                        <!-- LIFE -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="life" type="number"
                                    class="form-control @error('life') is-invalid @enderror" name="life"
                                    value="{{ $character->life }}" required autofocus>
                                <label for="life">Life</label>
                            </div>
                        </div>
                        <!-- CLASS-TYPE -->
                        <div class="form-floating col-12 col-md-6">
                            <select class="form-select" name="type_id" id="type_id" aria-label="Realizzato con">
                                <option value="{{ $character->type->id }}" selected>{{ $character->type->name }}</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Classe</label>
                        </div>
                    </div>
                    <!-- DESCRIPTIONS -->
                    <div class="form-floating mb-3">
                        <textarea id="type" name="description" class="form-control" id="description" rows="5">{{ $character->description }}</textarea>
                        <label for="description">Descrizione</label>
                    </div>

                    <!-- ITEMS -->
                    <div class="text-center mb-3 mt-4">
                        Item:
                    </div>
                    <div class="d-flex container-fluid justify-content-start align-items-center flex-wrap">
                        @foreach ($items as $item)
                            <div class="form-check col-6 col-md-4 col-lg-3">
                                @if ($errors->any())
                                    <input type="checkbox" name="items[]" value="{{ $item->id }}"
                                        class="form-check-input"
                                        {{ in_array($item->id, old('items', [])) ? 'checked' : '' }}>
                                @else
                                    <input type="checkbox" name="items[]" value="{{ $item->id }}"
                                        class="form-check-input"
                                        {{ $character->items->contains($item) ? 'checked' : '' }}>
                                @endif
                                <label for="" class="form-check-label">{{ $item->name }}</label>
                            </div>
                        @endforeach
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
