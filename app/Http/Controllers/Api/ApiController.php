<?php

namespace App\Http\Controllers\Api;

//import Model "Post"
use App\Models\SettingModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//import Resource "PostResource"
use App\Http\Resources\ApiResource;

class ApiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $posts = SettingModel::latest();

        //return collection of posts as a resource
        return new ApiResource(true, 'List Data', $posts);
    }
}