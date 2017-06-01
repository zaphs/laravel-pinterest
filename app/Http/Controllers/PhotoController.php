<?php

namespace App\Http\Controllers;

use App\Like;
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
        $this->photos = $photos;
    }

    public function dashboard(Request $request)
    {
        $photos = $this->photos->findAll();

        return view('photo.list', ['photos'=>$photos]);
    }

    public function profilephotos(Request $request)
    {
        $photos = $this->photos->profilePhotos($request->user());

        return view('photo.list', ['photos'=>$photos]);
    }

    public function view(Request $request, $id)
    {
        $photo = Photo::where('id', (int)$id)->first();

        $actions = [
            [
                'route'=>'follow',
                'name'=>'Follow',
                'id' => $photo->user->id,
            ],
            [
                'route'=>'like',
                'name'=>'Like',
                'id' => $id,
            ],
        ];

        return view('photo.view', ['photo'=>$photo, 'actions'=>$actions]);
    }
}
