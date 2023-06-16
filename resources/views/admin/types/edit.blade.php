@extends('layouts.admin')


@section('content')
    <section class="container my-4">
        <h2>Modifica la tua classe </h2>
        <form class="text-dark" action="{{ route('admin.characters.update', $character->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Errors Section --}}
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    @error('name')
                        <p>*{{ $message }}</p>
                    @enderror
                    @error('description')
                        <p>*{{ $message }}</p>
                    @enderror
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="50">{{ $item->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </section>
@endsection
