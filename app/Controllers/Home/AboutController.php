<?php

namespace App\Controllers\Home;

use App\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $model = new About();
        $data = $model->getAttributes();
        $this->generate('Home', 'About', $data);
    }
}
