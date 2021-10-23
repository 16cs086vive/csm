<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\template;

class userside extends Controller
{
    public function index()
    {
        echo "user controller";
    }
    function showPostWindow(Request $postinfo)
    {
        $activetemp = template::where('status', 1)->get();
        foreach ($activetemp as $temp) {

            // if ($temp->templateName == 'TemplateOne') {
            //     return view('users/template1/posts')->with('postinfo', post::orderBy('id', 'DESC')->get());
            // } else if ($temp->templateName == 'TemplateTwo') {
            //     return view('users/template2/posts')->with('postinfo', post::orderBy('id', 'DESC')->get());
            // } else {
            //     return view('users/template3/posts')->with('postinfo', post::orderBy('id', 'DESC')->get());
            // }
        }
        return view('users/posts')->with('postinfo', post::orderBy('id', 'DESC')->get());
    }
    public  function msg()
    {
        echo "testing";
    }
}
