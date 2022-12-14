<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyController extends Controller
{
    public  function index()
    {
        echo "En index de estudios";
    }

    public function show($id)
    {
        echo "En show de estudio $id";
    }

    public function create()
    {
        echo "En create de estudio ";
    }

    public function edit($id)
    {
        echo "En edit de estudio $id ";
    }
}
