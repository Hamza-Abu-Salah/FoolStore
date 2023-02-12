<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function uploadFile($file, $path)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . rand(10000, 10000000) . $extension;
        $destinationPath = base_path(). '/public/' . $path ;
        $file->move($destinationPath, $fileName);
        return $fileName;
    }

    public static function uploadMultiFiles($file, $path, $i)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = (time() . $i) . '.' . rand(10000, 10000000) . $extension;
        $destinationPath = base_path(). '/public/' . $path ;
        $file->move($destinationPath, $fileName);
        return $fileName;
    }

    public function uploadTest($file, $path) {
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . rand(10000, 10000000) . $extension;
        $destinationPath = base_path(). '/public/' . $path ;
        $file->move($destinationPath, $fileName);
        return $fileName;
    }

    /*************** For Api Start ******************/
    public function success($message = "The operation completed successfully", int $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
        ], $code);
    }

    public function error($message = null, int $code = 401)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }
    /*************** For Api End ******************/
}
