<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use DB;
 
class DownloadController extends Controller
{
    public function downloadfile($filename)
    {
        $filepath = public_path('images/'.$filename.'.pdf');
        return Response::download($filepath); 
    }
}
