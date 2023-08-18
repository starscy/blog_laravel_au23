<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Service\PostSevice;


class BaseController extends Controller
{
    public $service;

    public function __construct(PostSevice $service)
    {
        $this->service = $service;
    }
}
