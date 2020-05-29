<?php

namespace App\Http\Controllers;

use App\Haslo;
use Illuminate\Http\Request;

class HasloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return Haslo::all();
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
        Haslo:: create($request -> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Haslo  $haslo
     * @return \Illuminate\Http\Response
     */
    public function show(Haslo $haslo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Haslo  $haslo
     * @return \Illuminate\Http\Response
     */
    public function edit(Haslo $haslo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Haslo  $haslo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Haslo $haslo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Haslo  $haslo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Haslo $haslo)
    {
        $haslo->delete();
    }
}
