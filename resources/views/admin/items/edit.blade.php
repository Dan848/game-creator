@extends('layouts.admin')


@section('content')
    <section class="container my-4">
        <h2> Modifica il tuo oggetto </h2>
        <form class="text-bg-dark" action="{{ route('admin.items.store') }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Errors Section --}}
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    @error('name')
                        <p>*{{ $message }}</p>
                    @enderror
                    @error('category')
                        <p>*{{ $message }}</p>
                    @enderror
                    @error('type')
                        <p>*{{ $message }}</p>
                    @enderror
                    @error('cost')
                        <p>*{{ $message }}</p>
                    @enderror
                    @error('weight')
                        <p>*{{ $message }}</p>
                    @enderror
                    @error('description')
                        <p>*{{ $message }}</p>
                    @enderror
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label"> Categoria </label>
                <input type="text" class="form-control" id="category" name="category">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label"> Tipo </label>
                <input type="text" class="form-control" id="type" name="type">
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label"> Peso </label>
                <input type="text" class="form-control" id="weight" name="weight">
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label"> Costo </label>
                <input type="text" class="form-control" id="cost" name="cost">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label"> Categoria </label>
                <input type="text" class="form-control" id="category" name="category">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </section>
@endsection
