<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    protected $paginate = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'kategori' => Kategori::orderBy('nama', 'ASC')
                    ->when($request->has('q') && $request->q != "", function ($query) use ($request) {
                        $query->where('nama','LIKE','%'.$request->q.'%');
                    })
                    ->paginate($request->rows ?? $this->paginate)
                    ->appends($request->only('rows','q'))
        ];

        return view ('kategori.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'  => 'required|unique:kategori,nama',
        ],
        [
            'nama.required' => 'Kategori wajib diisi.',
            'nama.unique' => 'Kategori sudah ada sebelumnya',
        ]);

        if ($validator->fails()) {
           return redirect()->route('kategori.index')->with([
                'message' => 'Tambah data kategori gagal tersimpan',
                'error' => true
            ]);
        }

        $data = [
            'nama'  =>  $request->nama,
            'slug'  =>  Str::slug($request->nama)
        ];

        Kategori::create($data);

        return redirect()->route('kategori.index')
        ->with([
            'message' => 'Tambah data kategori berhasil disimpan ke dalam Database',
            'success' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view ('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'nama'  => 'required|unique:kategori,nama,'. $kategori->id
        ],
        [
            'nama.required' => 'Kategori wajib diisi.',
            'nama.unique' => 'Kategori sudah ada sebelumnya',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Tidak dapat menyimpan data'],422);
        }

        $data = [
            'nama'  =>  $request->nama,
            'slug'  =>  Str::slug($request->nama)
        ];

        $kategori->update($data);

        return redirect()->route('kategori.index')
            ->with([
                'message' => 'Perubahan data kategori berhasil disimpan',
                'success' => true
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with([
                'message' => 'Data kategori berhasil dihapus',
                'success' => true
            ]);
    }
}
