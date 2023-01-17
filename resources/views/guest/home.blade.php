@extends('guest.layouts.base');

@section('content')

<div class="row row-cols-4">
    @foreach ($trains as $train)
<div class="col">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
          {{$train->company}}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{$train->departure_station}}</li>
          <li class="list-group-item">{{$train->arrival_station}}</li>
          <li class="list-group-item">{{$train->daparture_time}}</li>
          <li class="list-group-item">{{$train->arrival_time}}</li>
          <li class="list-group-item">{{$train->train_code}}</li>
          <li class="list-group-item">{{$train->carriage_number}}</li>
          <li class="list-group-item">{{$train->in_time}}</li>
          <li class="list-group-item">{{$train->cancelled}}</li>
        </ul>
      </div>
</div>
    @endforeach
</div>

@endsection
