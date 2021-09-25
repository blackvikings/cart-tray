<?php

namespace App\Http\Controllers\Admin;

use App\Composition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compositions = Composition::all();
        return view('admin_panel.compositions.index', compact('compositions'));
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
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        Composition::create([ 'title' => $request->title]);

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function show(Composition $composition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function edit(Composition $composition)
    {
        return view('admin_panel.compositions.edit', compact('composition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Composition $composition)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $composition->title = $request->title;
        $composition->save();

        return redirect()->route('admin.composition');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Composition $composition)
    {
        $composition->delete();
        return redirect()->back();
    }
}
