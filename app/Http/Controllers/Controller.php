<?php

namespace App\Http\Controllers;

//use http\Env\Request;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Artwork;
use App\Models\Artist;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index () {
        $page = 'gallery';
        $artworks = Artwork::all();

        return view('index', [
            'page' => $page,
            'artworks' => $artworks
        ]);
    }

    public function artist () {
        $page = 'artist';
        $artist = Artist::where('id', 1)->first();

        return view('artist')->with([
            'page' => $page,
            'artist' => $artist
        ]);
    }

    public function contact () {
        $page = 'contact';
        return view('contact')->with('page', $page);
    }

    public function send (Request $request) {
        $page = 'contact';
//        Validation
//        this.validate($request, $rules, $message) or this.validate($request+$rules, $message)
        $contactData = $request->validate(
            [
                'first_name' => ['required', 'string', 'max:30'],
                'last_name' => ['required', 'string', 'max:30'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'subject' => ['required', 'string', 'max:255'],
                'message' => ['required', 'string']
            ]
        );

        if ($contactData) {
            Mail::send(new Contact($contactData));
            return back()->with('success', 'Message sent successfully!');
        }

        return back();
//        dd($request->input());
    }

    public function RouteError ()
    {
        return back();
    }
}
