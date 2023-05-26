@extends('layouts.app')

@section('page_title')
    Home
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            {{-- @foreach ($characters as $character) --}}
            <div class="col-12 col-md-4 g-5">
                <div class="card">
                    <div class="card-head">
                        <h3>Nome personaggio: Master</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Attacco: <strong> 23</strong></li>
                            <li class="list-group-item">Difesa: <strong>19</strong></li>
                            <li class="list-group-item">Velocità: <strong>2</strong></li>
                            <li class="list-group-item">Intelligenza: <strong>Alta</strong></li>
                            <li class="list-group-item">Vita: <strong>80%</strong></li>
                            <li class="list-group-item">Descrizione: <strong> Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Vitae, quos officiis. Excepturi! </strong> </li>
                        </ul>
                    </div>

                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
