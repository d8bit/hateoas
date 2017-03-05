<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class CarController extends BaseController
{
    public function index()
    {
        $cars = \App\Models\Car::all();
        return \Response::json($cars);
    }


    public function info($car_id)
    {
        try {
            $car = \App\Models\Car::findOrFail($car_id);
            return \Response::json($car);
        } catch (\Exception $e) {
            return \Response::json('Car not found', 400);
        }
    }

    public function delete($car_id)
    {
        try {
            $car = \App\Models\Car::findOrFail($car_id);
            $res = $car->delete();
            return \Response::json($res);
        } catch (\Exception $e) {
            return \Response::json($e->getMessage(), 400);
        }
    }

}
