<?php

namespace App\Http\Controllers;

use App\OlahRaga\Football;
use App\OlahRaga\Basketball;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class SportController extends Controller
{
    public function index()
    {
        $football = new Football();
        $basketball = new Basketball();

        echo $football->greeting();
        echo "<br>";
        echo $basketball->greeting();
    }

    public function logGreetings()
    {
        $date = Carbon::now()->format('Y-m-d');
        $logFileName = Arr::last(explode("\\", get_class())) . "-{$date}.log";
        $football = new Football();
        $basketball = new Basketball();

        Log::build([
            'driver' => 'single',
            'path' => storage_path("logs/{$logFileName}"),
        ])->info($football->greeting());

        Log::build([
            'driver' => 'single',
            'path' => storage_path("logs/{$logFileName}"),
        ])->info($basketball->greeting());

        return "Greetings have been logged.";
    }
}
