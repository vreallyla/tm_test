<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use App\Models\MJadwal;
use App\Models\MPoli;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class JadwalController extends Controller
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new MJadwal();
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
        return view($this->view, [...$this->model->defaultData(), 'haris' => Hari::select('id as kode', 'nama')->get()]);
    }

    public function printout()
    {
        $poli = MPoli::with([
            'mPegawai'
        ])->get()->toArray();

        return view('cetak.jadwal', compact('poli'));
        $pdf = PDF::loadView('cetak.jadwal', compact('poli'))->setPaper('a4', 'landscape');
        return $pdf->download("jadwal_" . now()->format('Y-m-d') . ".pdf");
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'm_pegawai_id' => ['exists:m_pegawai,id', 'required'],
            'hari_id' => ['exists:hari,id', 'required'],
            'jam_pulang' => ['required'],
            'jam_masuk' => ['required'],
        ]);

        $check = MJadwal::where('m_pegawai_id', $request->m_pegawai_id)
            ->where('hari_id', $request->hari_id)
            ->first();

        if ($check)
            $check->update($validate);
        else
            MJadwal::create($validate);

        return redirect()->route('jadwal.index')->with('status', 'Jadwal berhasil diatur!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MJadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('status', 'Jadwal berhasil dihapus!');
    }
}
