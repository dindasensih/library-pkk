<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Buku::all();
        return view('buku.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Buku::all();
        $kategori = Kategori::all();
        return view('buku.create', compact('data', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $file = $request->file('cover')->store('img');
        Buku::create([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'sinopsis' => $request->sinopsis,
            'cover' => $file,
            'kategori_id' => $request->kategori_id,
            'user_id' => $user,

        ]);
         
        return redirect('buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Buku ::findOrFail($id);
        $kategori = Kategori::all();
        return view('buku.edit', compact('data', 'kategori'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $data = Buku::find($id);
        if ($request->file('cover')) {
            $file = $request->file('cover')->store('img');
            $data->update([
                'isbn' => $request->isbn,
                'judul' => $request->judul,
                'penerbit' => $request->penerbit,
                'sinopsis' => $request->sinopsis,
                'cover' => $file,
                'kategori_id' => $request->kategori_id,
                'user_id' => $user,
            ]);
        }else {
            $data->update([
                'isbn' => $request->isbn,
                'judul' => $request->judul,
                'penerbit' => $request->penerbit,
                'sinopsis' => $request->sinopsis,
                'cover' => $data->cover,
                'kategori_id' => $request->kategori_id,
                'user_id' => $user,
                
            ]);
        }
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Buku::findOrfail($id);
        $data->delete();
        return redirect('buku');
    }

    public function dashboard()
    {
        $data = Buku::all();
        return view('dashboard', compact('data'));
    }
}
