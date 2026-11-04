<?php

namespace App\Http\Controllers;

use App\Http\Requests\LokasiRequest;
use App\Models\Lokasi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Lokasi::all();

        return view('admin.pages.lokasi', compact('location'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LokasiRequest $request)
    {
        $this->authorize('create', Lokasi::class);

        Lokasi::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Lokasi berhasil ditambahkan.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LokasiRequest $request, Lokasi $lokasi)
    {
        $this->authorize('update', $lokasi);

        $lokasi->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Lokasi berhasil diubah.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $this->authorize('delete', $lokasi);

        $lokasi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lokasi berhasil dihapus.',
        ]);
    }
}
