<?php

namespace App\Http\Controllers;

use App\Models\BillingPeriod;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(5);
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $billingPeriods = BillingPeriod::all()->pluck('period', 'id');
        $service = new Service();
        return view('services.create')->with('service', $service)->with('billingPeriods', $billingPeriods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Service::$rules);

        Service::create($request->all());

        return redirect()->route('services.index')
            ->with('success', trans('global.Service created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $billingPeriods = BillingPeriod::all()->pluck('period', 'id');

        return view('services.edit')->with('service', $service)->with('billingPeriods', $billingPeriods);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate(Service::$rules);
        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', trans('global.Service updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', trans('global.Service deleted successfully'));
    }
}
