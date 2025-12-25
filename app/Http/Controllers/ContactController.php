<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function customFields()
    {
        return view('admin.contact.custom-fields');
    }
}
