@extends('layouts.app')

@section('page_title')
    Home
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($characters as $character)
                <div class="col-12 col-md-4 g-5">
                    <div class="card">
                        <div class="text-center d-flex justify-content-between p-3">
                            <h3>
                                {{ $character['name'] }}
                            </h3>
                            <a href="{{ route('admin.characters.show', $character->id) }}" class="info-box rounded-3 text-center text-white">
                                <i class="fa-solid fa-info"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Attacco: <strong>{{ $character['attack'] }}</strong></li>
                                <li class="list-group-item">Difesa: <strong>{{ $character['defence'] }}</strong></li>
                                <li class="list-group-item">Velocità: <strong>{{ $character['speed'] }}</strong></li>
                                <li class="list-group-item">Intelligenza: <strong>{{ $character['intelligence'] }}</strong>
                                </li>
                                <li class="list-group-item">Vita: <strong>{{ $character['life'] }}</strong></li>
                                <li class="list-group-item">Descrizione: <strong> {{ $character['description'] }} </strong>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
