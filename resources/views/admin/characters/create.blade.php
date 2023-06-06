@extends('layouts.app')

@section('content')
    <section class="container my-4">
        <form class="text-black" action="{{ route('admin.characters.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="attack" class="form-label">Strength</label>
                <input type="text" class="form-control" id="attack" name="attack">
            </div>
            <div class="mb-3">
                <label for="defence" class="form-label">Defence</label>
                <input type="text" class="form-control" id="defence" name="defence">
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Speed</label>
                <input type="text" class="form-control" id="speed" name="speed">
            </div>
            <div class="mb-3">
                <label for="intelligence" class="form-label">Intelligence</label>
                <input type="text" class="form-control" id="intelligence" name="intelligence">
            </div>
            <div class="mb-3">
                <label for="life" class="form-label">Life</label>
                <input type="text" class="form-control" id="life" name="life">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </section>
@endsection
