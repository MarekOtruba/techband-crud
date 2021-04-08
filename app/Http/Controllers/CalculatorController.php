<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calculator.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showResult(Request $request)
    {
        $request->validate(['calculator_date' => 'required|date']);
        $date = Carbon::createFromFormat('Y-m-d', $request->get('calculator_date'));
        $result = Service::model()->calculateMonthlyPrice(clone $date);

        return view('calculator.index')->with('calculator_date', $date)->with('result', $result);
    }
}
