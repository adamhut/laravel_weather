<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    const BASE_URL= "https://api.openweathermap.org/data/2.5/forecast?";

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apiKey = config('services.openweathermap.key');

        $lat  = request('lat', '33.9850');
        $lon  = request('lon', '-117.9588');
        
        // $apiUrl= "APPID=".config('services.openweathermap.key');

        // $resposne = Http::get(self::BASE_URL)
        //     .json()
        // $response = Http::get("https://api.openweathermap.org/data/2.5/forecast?lat={$lat}&lon={$lon}&APPID={$apiKey}&units=imperial&cnt=5")
        //     ->json();
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&APPID={$apiKey}&units=imperial")
            ->json();

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
