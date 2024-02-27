<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    public function info()
    {
        return phpinfo();
    }

    public function user_info(Request $request) 
    {
        $user_data = array(
            'user_agent' => $request->server("HTTP_USER_AGENT"),
            'ip' => $request->server("HTTP_CLIENT_IP")
        );

        return view('user_info', $user_data);
    }

    public function database_info()
    {
        $tables = DB::select("show tables");
        return view("database_info", array('tables' => $tables));
    }
}
