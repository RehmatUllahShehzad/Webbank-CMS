<?php

namespace App\Http\Controllers\Admin;

use App\Models\Form;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.form.index');
    }

    public function show(Form $form)
    {

        return view('admin.dashboard.form.show', compact('form'));
    }
}
