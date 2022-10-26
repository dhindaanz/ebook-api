<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();

        return response()->json([
            "message" => "Load Data Succes",
            "data" => $data
        ], 200);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Siswa();
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->age = $request->age;
        $data->save();

        return response()->json([
            "message" => "Store Succes",
            "data" => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        if ($data){
            return $data;
        }else{
            return ["massage" => "Data Not Found"];
        }
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
        $data = Siswa::find ($id);
        if ($data){
            $data->name = $request->name ? $request->name : $data->name;
            $data->gender = $request->gender ? $request->gender : $data->gender;
            $data->age = $request->age ? $request->age : $data->age;
            $data->save();

            return $data;
        }else{
            return ["message" => "Data Not Found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::find ($id);
        if ($data){
            $data->delete();
            return ["message" => "Dellete Succes"];
        }else{
            return ["message" => "Data Not Found"];
        }
    }
}
