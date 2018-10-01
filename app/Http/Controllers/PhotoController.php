<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
class PhotoController extends Controller

{
    //
     public function index()
    {
       

       Image::configure(array('driver' => 'gd'));
$path= public_path('/storage/avatars/bl97lBjOQAcr7bPiGNlQEKavx2ZGXCqvhlam2isQ.png');
$path2=public_path('/images/default50x50.png');
// and you are ready to go ...
$image = Image::make($path)->resize(100, 100)->save($path2);
return view('pages.messages.images', compact('image'));
    }

}
