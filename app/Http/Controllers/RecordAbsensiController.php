<?php

namespace App\Http\Controllers;

use App\Models\Record_absensi;
use App\Http\Requests\StoreRecord_absensiRequest;
use App\Http\Requests\UpdateRecord_absensiRequest;

class RecordAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRecord_absensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecord_absensiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record_absensi  $record_absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Record_absensi $record_absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record_absensi  $record_absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Record_absensi $record_absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecord_absensiRequest  $request
     * @param  \App\Models\Record_absensi  $record_absensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecord_absensiRequest $request, Record_absensi $record_absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record_absensi  $record_absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record_absensi $record_absensi)
    {
        //
    }
}
