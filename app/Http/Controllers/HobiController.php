<?php

namespace App\Http\Controllers;

use App\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    public function index()
    {
        $data = Hobi::all();
        return view ('hobi.index', compact('data'));
    }

    public function create()
    {
        return view('hobi.create');
    }

    public function store(Request $request)
    {
        $hobi = new hobi;
        $hobi->hobi = $request->hobi;
        $hobi->save();
        return redirect()->route('hobi.index')
        ->with(['message' => 'Data Berhasil Ditambahkan']);
    }

    public function show($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.show', compact('hobi'));
    }

    public function edit($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.edit', compact('hobi'));
    }

    public function update(Request $request, $id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->hobi = $request->hobi;
        $hobi->save();
        return redirect()->route('hobi.index')
        ->with(['message' => 'Data Berhasil Ditambahkan']);
    }

    public function destroy($id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->delete();
        return redirect()->route('hobi.index')
            ->with(['message' => 'Data Berhasil Dihapus']);
    }
}
