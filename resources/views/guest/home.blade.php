@extends('guest.layouts.base')

@section('content')
<?php

?>
<div class="row g-4">
    @foreach ($arrResults as $result)
    <div class="col-12">
        <div class="train-ride">
            <div class="content p-2">
                <div class="col-1 mb-2">
                    <img class="img-fluid" src="{{asset('img/' . $result['src'] . '.png')}}" alt="">
                </div>
                <span class="train-code">{{$result['train_code']}}</span>
                <div class="info d-flex justify-content-between align-items-center p-4">
                    <div class="departure d-flex flex-column">
                        <div class="hour">{{$result['departure_time']}}</div>
                        <div class="station">{{$result['departure_station']}}</div>
                    </div>
                    <div class="line"></div>
                    <div class="time">{{$result['hours'] . $result['hstr'] . $result['minutes'] . $result['minstr']}}</div>
                    <div class="line"></div>
                    <div class="arrival d-flex flex-column">
                        <div class="hour">{{$result['arrival_time']}}</div>
                        <div class="station">{{$result['arrival_station']}}</div>
                    </div>
                    <div class="details"></div>
                    <a {{$result['link']}} style="background-color: {{$result['background_color']}}">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center overflow-hidden">
                <div class="message col-1 text-center" style="color: {{$result['color']}}">{{$result['message1']}}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
