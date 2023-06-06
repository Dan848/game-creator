@extends('layouts.app')

@section('page_title')
    Home
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('admin.characters.create') }}" class="btn btn-primary">Crea il tuo personaggio</a>
        <div class="row">
            <h1 class="text-danger">Sono home</h1>
        </div>
    </div>
@endsection
