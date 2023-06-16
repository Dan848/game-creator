@extends('layouts.admin')

@section('content')
    <section class="container my-4">
        <form class="text-bg-dark" action="{{ route('admin.types.store') }}" method="POST">
            @csrf
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
                <input type="text" class="form-control" id="name" name="name">
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
