<?php

namespace App\Http\Controllers;

use App\Models\MPoli;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class JadwalController extends Controller
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new MPoli();
        $this->view = 'pages.jadwal.jadwal_index';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->view, $this->model->defaultData());
    }

    public function printout()
    {
        $poli=( MPoli::with([
            'mPegawai'
        ])->get()->toArray());

        $pdf = PDF::loadView('cetak.jadwal', compact('poli'))->setPaper('a4', 'landscape' );
        return $pdf->download("jadwal_".now()->format('Y-m-d').".pdf");

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
     * Show the form for editing the specified resource.
     *
     * @param  string  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($pegawai)
    {
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
