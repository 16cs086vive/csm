<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\template;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    function generatePDF()
    {
        $data = [
            'title' => 'welcome to the vivek ranjan pdf package testing ',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('users/myPDF', $data);
        return $pdf->download('vivekranjan.pdf');
    }
}
