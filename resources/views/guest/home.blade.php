@extends('guest.layouts.base')

@section('content')
<div class="row g-4">
    @foreach ($trains as $train)
    <?php
     $datediff = intval((strtotime($train->arrival_time) - strtotime($train->daparture_time))/60);
     $hours = intval($datediff/60);
     $minutes = $datediff%60;
     $hstr = 'h ';
     $minstr = 'min';
     if($hours === 0) {
        $hours = '';
        $hstr = '';
     } elseif ($minutes === 0) {
        $minutes = '0' . $minutes;
     };

     $message1 = '';
     $color = '';
     $background_color = '';
     $link = 'href="#"';

     if($train->in_time === 0) {
        $message1 = 'DELAYED';
        $color = 'yellow';
     } elseif ($train->cancelled ===1) {
        $message1 = 'CANCELLED';
        $color = '#890505';
        $background_color = 'lightgrey';
        $link = '';
     }

     $src = '';

     switch ($train->company) {
        case 'Trenord':
            $src = 'trenord';
            break;
        case 'Frecciarossa':
            $src = 'frecciarossa';
            break;
        case 'Frecciarossa 1000':
            $src = 'frecciarossa1000';
            break;
        case 'Regionale':
            $src = 'regionale';
            break;
        case 'Regionale Veloce':
            $src = 'regionaleveloce';
            break;
        case 'TTPER':
            $src = 'ttper';
            break;
     };

    ?>
    <div class="col-12">
        <div class="train-ride">
            <div class="content p-2">
                <div class="col-1 mb-2">
                    <img class="img-fluid" src="{{asset('img/' . $src . '.png')}}" alt="">
                </div>
                <span>{{$train->train_code}}</span>
                <div class="info d-flex justify-content-between align-items-center p-4">
                    <div class="departure d-flex flex-column">
                        <div class="hour">{{substr($train->daparture_time, 0, -3)}}</div>
                        <div class="station">{{$train->departure_station}}</div>
                    </div>
                    <div class="line"></div>
                    <div class="time">{{$hours . $hstr . $minutes . $minstr}}</div>
                    <div class="line"></div>
                    <div class="arrival d-flex flex-column">
                        <div class="hour">{{substr($train->arrival_time, 0, -3)}}</div>
                        <div class="station">{{$train->arrival_station}}</div>
                    </div>
                    <div class="details"></div>
                    <a {{$link}} style="background-color: {{$background_color}}">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center overflow-hidden">
                <div class="message col-1 text-center" style="color: {{$color}}">{{$message1}}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
