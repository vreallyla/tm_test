<?php

namespace App\Http\Controllers;

use App\Models\MPoli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new MPoli();
        $this->view='pages.poli.poli_index';
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view, [
            ...$this->model->defaultData(),
            'add' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->model->validateDefault();
        $this->model->create($validate);

        return redirect()->route('poli.index')->with('status', 'Poli berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  MPoli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit(MPoli $poli)
    {
        return view($this->view, [
            ...$this->model->defaultData(),
            'detail' => $poli
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MPoli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(MPoli $poli)
    {
        $validate = $this->model->validateDefault($poli->kode);
        $poli->update($validate);

        return redirect()->route('poli.index')->with('status', 'Poli berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MPoli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy(MPoli $poli)
    {
        $poli->delete();
        return redirect()->route('poli.index')->with('status', 'Poli berhasil dihapus!');
    }
}
