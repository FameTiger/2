<?php

namespace App\Controllers\Home;

use App\Controllers\Controller;
use App\Models\Index;

class IndexController extends Controller
{
    public function index()
    {
        $model = new Index();
        $data = $model->getAttributes();
        $this->generate('Home', 'Home', $data);
    }
}
