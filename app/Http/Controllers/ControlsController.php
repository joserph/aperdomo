<?php

namespace App\Http\Controllers;

use App\Http\Requests\ControlRequest;
use App\Models\Control;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Validity;
use Illuminate\Http\Request;

class ControlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controls = Control::paginate(15);

        return view('controls.index', compact('controls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::pluck('name', 'id');
        $partners = Partner::pluck('name', 'id');
        $validities = Validity::select('id', 'type', 'years')->get();
        //dd($validities);
        return view('controls.create', compact('services', 'partners', 'validities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ControlRequest $request)
    {
        Control::create($request->all());

        return redirect()->route('controls.index');
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
        $control = Control::find($id);
        $services = Service::pluck('name', 'id');
        $partners = Partner::pluck('name', 'id');
        $validities = Validity::select('id', 'type', 'years')->get();

        return view('partners.edit', compact('control', 'services', 'partners', 'validities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ControlRequest $request, $id)
    {
        $control = Control::find($id);
        $control->update($request->all());

        return redirect()->route('controls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $control = Control::find($id);
        $control->delete();

        return redirect()->route('controls.index');
    }
}
