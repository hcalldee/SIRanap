<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data_user'
        ];

        return view('Dashboard/index', $data);
    }


    //--------------------------------------------------------------------

}
