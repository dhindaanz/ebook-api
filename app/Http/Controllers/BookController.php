<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::all();

        return response()->json([
            "message" => "Load Data Succes",
            "data" => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storpublisherr.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Book();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->author = $request->author;
        $data->publisher = $request->publisher;
        $data->date_of_issue = $request->date_of_issue;
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
        $data = Book::find($id);
        if ($data){
            return $data;
        }else{
            return ["masspublisherr" => "Data Not Found"];
        }
    }

    /**
     * Update the specified resource in storpublisherr.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Book::find ($id);
        if ($data){
            $data->title = $request->title ? $request->title : $data->title;
            $data->description = $request->description ? $request->description : $data->description;
            $data->author = $request->author ? $request->author : $data->author;
            $data->publisher = $request->publisher ? $request->publisher : $data->publisher;
            $data->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $data->date_of_issue;
            $data->save();

            return $data;
        }else{
            return ["message" => "Data Not Found"];
        }
    }

    /**
     * Remove the specified resource from storpublisherr.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Book::find ($id);
        if ($data){
            $data->delete();
            return ["message" => "Dellete Succes"];
        }else{
            return ["message" => "Data Not Found"];
        }
    }
}
