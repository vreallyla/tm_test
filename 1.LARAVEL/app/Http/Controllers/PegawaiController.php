<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Helpers\StringHelper;
use App\Models\JobDesc;
use App\Models\MPegawai;
use App\Models\MPoli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{

    private $model;
    private $view;
    private $route;

    public function __construct()
    {
        $this->model = new MPegawai();
        $this->view = 'pages.pegawai.pegawai_index';
        $this->route = 'pegawai.index';
    }

    /**
     * Display a listing of the resource.
     *
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
            'add' => true,

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
        $jobdesck = JobDesc::where('kode', $validate['job_desc_id'])->select('id')->first();
        $poli = MPoli::where('kode', $validate['m_poli_id'])->select('id')->first();

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            $helper = new ImageHelper();
            $rand = str()->random(5);
            $img = $request->file('photo');
            $ext = $img->extension();
            $name =   "user_photo_$rand." . $ext;
            $validate['photo'] = MPegawai::$photoGetPath . $name;

            $compress = $helper->imageCompress($img, $ext);
            Storage::put(MPegawai::$photoSavePath . $name, $compress);
        }

        $this->model->create([
            ...$validate,
            'no_pegawai' => $this->model->generateCode($poli->id, $jobdesck->id),
            'job_desc_id' => $jobdesck->id,
            'm_poli_id' => $poli->id,
        ]);

        return redirect()->route($this->route)->with('status', 'Pegawai berhasil ditambahkan!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($pegawai)
    {
        $Pegawai = $this->model->setAlias()
            ->where('mpe.no_pegawai', $pegawai)
            ->poliRelation()
            ->jadwalRelation()
            ->jobDescRelation()
            ->select(
                'mpe.id',
                'mpe.no_pegawai',
                'mpe.sip',
                'mpe.nama',
                'mpe.jenis_kelamin',
                'jd.kode as kode_job_desc',
                'mp.kode as kode_poli',
                'mpe.alamat',
            )
            ->firstOrFail();

        return view($this->view, [
            ...$this->model->defaultData(),
            'detail' => $Pegawai
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  MPegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MPegawai $pegawai)
    {
        $validate = $this->model->validateDefault();
        $jobdesck = JobDesc::where('kode', $validate['job_desc_id'])->select('id')->first();
        $poli = MPoli::where('kode', $validate['m_poli_id'])->select('id')->first();

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            $helper = new ImageHelper();

            // delete image
            if ($pegawai->photo) {
                $string = new StringHelper();
                $pathOld = $string->translateStorageFromStringDB($pegawai->photo, MPegawai::$photoSavePath);
                if (Storage::exists($pathOld)) {
                    Storage::delete($pathOld);
                }
            }

            $rand = str()->random(5);
            $img = $request->file('photo');
            $ext = $img->extension();
            $name =   "user_photo_$rand." . $ext;
            $validate['photo'] = MPegawai::$photoGetPath . $name;

            $compress = $helper->imageCompress($img, $ext);
            Storage::put(MPegawai::$photoSavePath . $name, $compress);
        }

        $pegawai->update([
            ...$validate,
            'no_pegawai' => $this->model->generateCode($poli->id, $jobdesck->id),
            'job_desc_id' => $jobdesck->id,
            'm_poli_id' => $poli->id,
        ]);

        return redirect()->route($this->route)->with('status', 'Pegawai berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MPegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(MPegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route($this->route)->with('status', 'Pegawai berhasil dihapus!');
    }
}
