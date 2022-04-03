<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $db = new \IP2Location\Database(storage_path('app/IP2LOCATION-LITE-DB11.BIN'), \IP2Location\Database::FILE_IO);
        return $db->lookup('135.11.114.1', \IP2Location\Database::ALL);
    }
}
