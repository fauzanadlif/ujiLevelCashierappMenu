<?php

namespace App\Http\Controllers;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu/tables', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'harga_makanan' => 'required',
            'qty_makanan' => 'required',
            'gambar_makanan' => 'required',
        ]);

        $file = $request->file('gambar_makanan');

        // // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';

        // // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());

        Menu::create([
            'nama_makanan' => $request->nama_makanan,
            'harga_makanan' => $request->harga_makanan,
            'qty_makanan' => $request->qty_makanan,
            'gambar_makanan' => $file->getClientOriginalName()
        ]);
        return redirect('/menus')->with('status', 'Data ' . $request->nama_makanan . ' Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu/edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'harga_makanan' => 'required',
            'qty_makanan' => 'required',
            'gambar_makanan' => 'required',
        ]);

        $file = $request->file('gambar_makanan');

        // // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';

        // // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());

        Menu::where('id_makanan', $menu->id_makanan)
            ->update([
                'nama_makanan' => $request->nama_makanan,
                'harga_makanan' => $request->harga_makanan,
                'qty_makanan' => $request->qty_makanan,
                'gambar_makanan' => $file->getClientOriginalName()
            ]);
        return redirect('/menus')->with('status', 'Data ' . $request->nama_makanan . ' Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id_makanan);
        return redirect('/menus')->with('statusDelete', 'Data Berhasil Dihapus!');
    }
}
