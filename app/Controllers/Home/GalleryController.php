<?php

namespace App\Controllers\Home;

use App\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $model = new Gallery();
        $data = $model->getAttributes();
        $this->generate('Home', 'Gallery', $data);
    }
}
