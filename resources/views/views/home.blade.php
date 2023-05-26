@extends("layouts.app")

@section("page_title")
    Home
@endsection

@section("main_content")
<div class="container">
    <div class="row">
        @foreach ($trains as $train)
        <div class="col-12 col-md-4 g-5">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Agenzia: {{$train["agency"]}}</li>
                  <li class="list-group-item">Partenza: {{$train["departure_station"]}} {{substr($train["departure_time"], 0, 5)}}</li>
                  <li class="list-group-item">Arrivo: {{$train["arrival_station"]}} {{substr($train["arrival_time"], 0, 5)}}</li>
                  <li class="list-group-item">N° Treno: {{$train["train_code"]}}</li>
                  <li class="list-group-item">N° Carrozze: {{$train["number_of_carriages"]}}</li>
                  @if ($train["in_time"])
                  <li class="list-group-item">In orario...</li>
                  @elseif (!$train["deleted"])
                  <li class="list-group-item">In ritardo...</li>
                  @endif
                  @if ($train["deleted"])
                  <li class="list-group-item">Cancellato</li>
                  @endif
                </ul>
              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
