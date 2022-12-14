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
        echo "En edit de  $id ";
    }

    public function destroy($id)
    {
        echo "En destroy de $id";
    }

    public function update($id)
    {
        echo "En update de estudio";
    }

    public function store()
    {
        echo "En store de estudio";
    }
}
