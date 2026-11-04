<?php

namespace App\Http\Controllers;

use App\Http\Requests\HargaRequest;
use App\Models\Harga;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $b40 = Harga::where('jenis', '1')->orderBy('tanggal_awal', 'desc')->get();
        $hsfo = Harga::where('jenis', '2')->orderBy('tanggal_awal', 'desc')->get();
        $lsfo = Harga::where('jenis', '3')->orderBy('tanggal_awal', 'desc')->get();
        return view('admin.pages.harga', compact('b40', 'hsfo', 'lsfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HargaRequest $request)
    {
        $this->authorize('create', Harga::class);

        Harga::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Harga berhasil ditambahkan.',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HargaRequest $request, Harga $harga)
    {
        $this->authorize('update', $harga);

        $harga->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Harga berhasil diupdate.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Harga $harga)
    {
        $this->authorize('delete', $harga);

        $harga->delete();

        return response()->json([
            'success' => true,
            'message' => 'Harga berhasil dihapus.'
        ]);
    }
}
