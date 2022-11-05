<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidityRequest;
use App\Models\Validity;
use Illuminate\Http\Request;

class ValiditiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validities = Validity::paginate(15);

        return view('validities.index', compact('validities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('validities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidityRequest $request)
    {
        Validity::create($request->all());

        return redirect()->route('validities.index');
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
        $validity = Validity::find($id);

        return view('validities.edit', compact('validity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidityRequest $request, $id)
    {
        $validity = Validity::find($id);
        $validity->update($request->all());

        return redirect()->route('validities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validity = Validity::find($id);
        $validity->delete();

        return redirect()->route('validities.index');
    }
}
