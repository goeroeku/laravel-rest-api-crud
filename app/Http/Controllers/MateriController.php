<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Materi::all();

        return response()->json([
            'success' => 200,
            'data'   => $table
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Materi::create([
            "thumbnail" => $request->input("thumbnail"),
            "title" => $request->input("title"),
            "content" => $request->input("content"),
        ]);

        return response()->json([
            'success' => 201,
            'data'   => $table
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $table = Materi::where("uuid", $uuid)->firstOrFail();
        return response()->json([
            'success' => 201,
            'data'   => $table
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        dd($request->input("thumbnail"));
        $table = Materi::where("uuid", $uuid)->firstOrFail();
        $table->thumbnail = $request->input("thumbnail");
        $table->title = $request->input("title");
        $table->content = $request->input("content");
        $table->save();
        return response()->json([
            'success' => 203,
            'message'   => "Proses hapus data berhasil."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $table = Materi::where("uuid", $uuid)->firstOrFail();
        $table->delete();

        return response()->json([
            'success' => 203,
            'message'   => "Proses hapus data berhasil."
        ]);
    }
}
