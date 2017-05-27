<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\PhotoRepository;
use App\Photo;

class PhotoController extends Controller
{
    protected $photos;

    /**
     * PhotoController constructor.
     * @param PhotoRepository $messages
     * @return void
     */
    public function __construct(PhotoRepository $photos)
    {
        $this->middleware('auth');
        $this->photos = $photos;
    }

    public function dashboard(Request $request)
    {
        $photos = $this->photos->forUser($request->user());

        return view('photo.list', ['photos'=>$photos]);
    }

    public function profilephotos(Request $request)
    {
        $photos = $this->photos->profilePhotos($request->user());

        return view('photo.list', ['photos'=>$photos]);
    }

    public function photo(Request $request, $id)
    {
        $photo = Photo::where('id', (int)$id)->first();

        $actions = [];

        return view('photo.view', ['photo'=>$photo, 'actions'=>$actions]);
    }
}
