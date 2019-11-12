<?php

namespace App\Http\Controllers;

use App\Ownership;
use App\Dojo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OwnershipController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $ownerships = DB::table('ownerships')->join('dojos', 'ownerships.id_tempat', '=', 'dojos.id_tempat')
            ->where('ownerships.id_user', '=', $userId)->get();
        return view('pages.promote', [ "ownerships" => $ownerships, 'userId' => $userId ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dojo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Declaration
        $userId = Auth::id();
        $ownership = new Ownership();
        $dojo = new Dojo();
        $fileName = null;

        if (Input::file('foto_tempat')->isValid()) {
            $fileExtension = Input::file('foto_tempat')->getClientOriginalExtension();
            $fileName = time() . uniqid() . "." . $fileExtension;
            $destinationPath = public_path('img/upload/dojo/'.$userId.'/');
            Input::file('foto_tempat')->move($destinationPath, $fileName);
        }

        
        // Add Dojo
        $dojo->nama_tempat = $request->nama_tempat;
        $dojo->tanggal = $request->tanggal;
        $dojo->location = $request->location;
        $dojo->foto_tempat = $fileName;
        $dojo->save();

        // Add Ownership
        $ownership->id_user = $userId;
        $ownership->id_tempat = $dojo->id_tempat;
        $ownership->hari_latihan = $request->hari_latihan;
        $ownership->jadwal_mulai = $request->jadwal_mulai;
        $ownership->jadwal_berakhir = $request->jadwal_berakhir;
        $ownership->beladiri = $request->beladiri;
        $ownership->biaya = $request->biaya;
        $ownership->save();
        
        return redirect('/promote');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ownership = DB::table('dojos')->join('ownerships', 'ownerships.id_tempat', '=', 'dojos.id_tempat')
        ->join('users', 'ownerships.id_user', '=', 'users.id')
        ->where('id_kepemilikan', $id)->first();
        return view('pages.detail', ['ownership' => $ownership]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ownership = DB::table('dojos')->join('ownerships', 'ownerships.id_tempat', '=', 'dojos.id_tempat')->where('id_kepemilikan', $id)->first();
        return view('pages.edit', ['ownership' => $ownership]);
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
        $userId = Auth::id();
        $ownership = DB::table('dojos')->join('ownerships', 'ownerships.id_tempat', '=', 'dojos.id_tempat')->where('id_kepemilikan', $id);
        $oldImage = DB::table('dojos')->join('ownerships', 'ownerships.id_tempat', '=', 'dojos.id_tempat')->where('id_kepemilikan', $id)->value('foto_tempat');


        if (Input::file('foto_tempat')->isValid()) {
            $imagePath = public_path('img/upload/dojo/'.$userId.'/'.$oldImage);
            File::delete($imagePath);
            $fileExtension = Input::file('foto_tempat')->getClientOriginalExtension();
            $fileName = time() . uniqid() . "." . $fileExtension;
            $destinationPath = public_path('img/upload/dojo/'.$userId.'/');
            Input::file('foto_tempat')->move($destinationPath, $fileName);
        }

        $ownership->update([
            'nama_tempat' => $request->nama_tempat,
            'tanggal' => $request->tanggal,
            'location' => $request->location,
            'foto_tempat' => $fileName,
            'hari_latihan' => $request->hari_latihan,
            'jadwal_mulai' => $request->jadwal_mulai,
            'jadwal_berakhir' => $request->jadwal_berakhir,
            'beladiri' => $request->beladiri,
            'biaya' => $request->biaya
        ]);

        return redirect('/promote');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = Auth::id();
        $ownership = DB::table('dojos')->join('ownerships', 'ownerships.id_tempat', '=', 'dojos.id_tempat')->where('id_kepemilikan', $id);
        $imagePath = public_path("img/upload/dojo/".$userId.'/'.$ownership->first()->foto_tempat);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $ownership->delete();
        return back();
    }

    public function search(Request $request) {
        $joinedTable = DB::table('dojos')->join('ownerships', 'ownerships.id_tempat', '=', 'dojos.id_tempat');
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $ownerships = $joinedTable->where('nama_tempat', 'like', '%'.$keyword.'%')
            ->orWhere('location', 'like', '%'.$keyword.'%')
            ->orWhere('hari_latihan', 'like', '%'.$keyword.'%')
            ->orWhere('beladiri', 'like', '%'.$keyword.'%')
            ->get();
        }
        else {
            $ownerships = $joinedTable->get();
        }
        return view('pages.search', ['ownerships' => $ownerships]);
    }
}
