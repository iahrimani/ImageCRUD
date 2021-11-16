<?php

namespace App\Http\Controllers;

use App\Events\ImageDelEvent;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $images = Image::all();

        return view('image', compact('images'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('path')->store('images');
        $image = Image::create([
            'name' => $request->name,
            'path' => $path,
        ]);

        return redirect(route('image.index'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image =Image::find($id);
        event(new ImageDelEvent($image));

        $image->delete();

        return redirect()->route('image.index');
    }
}
