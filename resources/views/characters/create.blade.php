@extends('layouts.app');

@section('main_content')
    <section class="container my-4">
        <form class="text-light" action="{{route('characters.store')}}" method="POST">
            @csrf

            <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="strength" class="form-label">Strength</label>
                <input type="text" class="form-control" id="strength">
            </div>
            <div class="mb-3">
                <label for="defence" class="form-label">Defence</label>
                <input type="text" class="form-control" id="defence">
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Speed</label>
                <input type="text" class="form-control" id="speed">
            </div>
            <div class="mb-3">
                <label for="intelligence" class="form-label">Intelligence</label>
                <input type="text" class="form-control" id="intelligence">
            </div>
            <div class="mb-3">
                <label for="life" class="form-label">Life</label>
                <input type="text" class="form-control" id="life">
            </div>
            <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </section>
@endsection
