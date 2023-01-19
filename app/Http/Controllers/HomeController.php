<?php

namespace App\Http\Controllers;

use App\Train;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    $trains = Train::all();

    $arrResults = [];

    foreach ($trains as $train) {
        $datediff = intval((strtotime($train->arrival_time) - strtotime($train->departure_time))/60);
        $hours = intval($datediff/60);
        $minutes = $datediff%60;
        $hstr = 'h ';
        $minstr = 'min';
        $message1 = null;
        $color = null;
        $background_color = null;
        $src = null;
        $link = 'href="#"';
        $train_code = $train->train_code;
        $departure_time = substr($train->departure_time, 0, -3);
        $departure_station = $train->departure_station;
        $arrival_time = substr($train->arrival_time, 0, -3);
        $arrival_station =$train->arrival_station;

        if($hours === 0) {
            $hours = null;
            $hstr = null;
         };

         if($minutes === 0) {
            $minutes = '0' . $minutes;
         };

        if($train->in_time === 0) {
           $message1 = 'DELAYED';
           $color = 'yellow';
        };

        if ($train->cancelled === 1) {
           $message1 = 'CANCELLED';
           $color = '#890505';
           $background_color = 'lightgrey';
           $link = null;
        };

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

        $arrResults[] = [
            'src'=> $src,
            'hours'=> $hours,
            'minutes'=> $minutes,
            'hstr'=> $hstr,
            'minstr'=> $minstr,
            'message1'=> $message1,
            'color'=> $color,
            'link'=>$link,
            'background_color'=>$background_color,
            'train_code'=>$train_code,
            'departure_time'=>$departure_time,
            'departure_station'=>$departure_station,
            'arrival_time'=>$arrival_time,
            'arrival_station'=>$arrival_station,
        ];
    }

        return view('guest.home', [
            'arrResults'=> $arrResults,
        ]);
    }
}
