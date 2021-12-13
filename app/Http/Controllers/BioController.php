<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'about';
        $artist = Artist::where('id', '=', 1)
            ->first();

        return view('control.cms.bio')->with([
            'page' => $page,
            'artist' => $artist
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('bio.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect(route('bio.index'));
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
            'about_artist' => 'required'
        ]);

        if ($request->artist_image == null)
        {
            Artist::where('id', $id)
                ->update(['artist_about' => $request->about_artist]);
        }else{
//            Create artist image name
            $newArtistImage = time() . '-' . 'artist' . '.' . $request->artist_image->extension();
//            Move image to  images folder
            $request->artist_image->move(public_path('images'), $newArtistImage);

            Artist::where('id', $id)
                ->update([
                    'artist_image' => $newArtistImage,
                    'artist_about' => $request->about_artist
                ]);
        }

        return back()->with('success', 'Bio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
