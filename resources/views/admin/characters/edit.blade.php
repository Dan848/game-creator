@extends('layouts.app')


@section('content')
    <section class="container my-4">
        <h2>Modifica il tuo personaggio</h2>
        <form class="text-dark" action="{{ route('admin.characters.update', $character->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Errors Section --}}
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    @error('name')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('attack')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('defence')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('speed')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('intelligence')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('life')
                        <p>*{{ $message }}</p>
                    @enderror

                    @error('description')
                        <p>*{{ $message }}</p>
                    @enderror
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $character->name }}">
            </div>
            <div class="mb-3">
                <label for="attack" class="form-label">Forza</label>
                <input type="text" class="form-control" id="attack" name="attack" value="{{ $character->attack }}">
            </div>
            <div class="mb-3">
                <label for="defence" class="form-label">Difesa</label>
                <input type="text" class="form-control" id="defence" name="defence" value="{{ $character->defence }}">
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Velocità</label>
                <input type="text" class="form-control" id="speed" name="speed" value="{{ $character->speed }}">
            </div>
            <div class="mb-3">
                <label for="intelligence" class="form-label">Intelligenza</label>
                <input type="text" class="form-control" id="intelligence" name="intelligence"
                    value="{{ $character->intelligence }}">
            </div>
            <div class="mb-3">
                <label for="life" class="form-label">Vita</label>
                <input type="text" class="form-control" id="life" name="life" value="{{ $character->life }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="50">{{ $character->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </section>
@endsection
