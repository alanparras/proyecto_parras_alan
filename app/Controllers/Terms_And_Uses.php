<?php

namespace App\Controllers;

class Terms_And_Uses extends BaseController
{
    public function index()
    {
        $data = ['titulo' => 'Prime Shoes | Términos y usos'];
        return view('front/termsAndUses', $data);
    }
}