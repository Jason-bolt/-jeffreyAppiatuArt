<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;

class ArtworksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'artworks';
        $artworks = Artwork::all();
        return view('control.cms.artworks')->with([
            'page' => $page,
            'artworks' => $artworks
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        Validate form
        $request->validate([
            'artwork_image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'artwork_name' => 'required'
        ]);

//        Cleaning up name
        $editedName = str_replace(' ', '_', $request->artwork_name);
//        Changing artwork image name for database
        $newArtworkImage = time() . '-' . $editedName . '.' . $request->artwork_image->extension();
//        Moving image to images folder in public
        $request->artwork_image->move(public_path('images'), $newArtworkImage);

        $artwork = Artwork::create([
            'artwork_name' => $request->artwork_name,
            'artwork_image' => $newArtworkImage
        ]);

        return back()->with('success', 'Successfully uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('artworks.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect(route('artworks.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'artwork_name' => 'required'
        ]);

        if ($request->artwork_image == null)
        {
            Artwork::where('id', $id)
                ->update(['artwork_name' => $request->artwork_name]);
        }else{
            $editedName = str_replace(' ', '_', $request->artwork_name);
            $updatedArtworkImage = time() . '-' . $editedName . '.' . $request->artwork_image->extension();
            $request->artwork_image->move(public_path('images'), $updatedArtworkImage);

            Artwork::where('id', $id)
                ->update([
                    'artwork_image' => $updatedArtworkImage,
                    'artwork_name' => $request->artwork_name
                ]);
        }

        return back()->with('success', 'Artwork updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $del = Artwork::where('id', $id)
            ->delete();

        return back()->with('success', 'Artwork deleted successfully.');
    }
}
