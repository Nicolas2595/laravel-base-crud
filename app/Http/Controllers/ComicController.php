<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view("comics.index", compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|max:100',
                'series' => 'required|max:50',
                'price' => 'required|numeric|min:0.01|max:999.99',
                'thumb' => 'required|max:255',
                'description' => 'required|max:65535',
                'sale_date' => 'required|date',
                'type' => 'required|max:50'
            ]
        );

        $data = $request->all();

        $comic = new Comic();

        $comic->fill($data);

        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);

        if($comic) {
            return view("comics.show", compact('comic'));
        }
        abort(404, "Not Found");
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        return view("comics.edit", compact('comic'));
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

        $request->validate(
            [
                'title' => 'required|max:100',
                'series' => 'required|max:50',
                'price' => 'required|numeric|min:0.01|max:999.99',
                'thumb' => 'required|max:255',
                'description' => 'required|max:65535',
                'sale_date' => 'required|date',
                'type' => 'required|max:50'
            ]
        );

        $data = $request->all();

        $comic = Comic::findOrFail($id);

        $comic->update($data);

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);

        $comic->delete();

        return redirect()
            ->route('comics.index')
            ->with('deleted', 'Comic cancellato correttamente');
    }
}
