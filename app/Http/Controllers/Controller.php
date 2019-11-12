<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* protected function configProfile(string $file, string $path) {
        if (Input::file($file)->isValid()) {
            $fileExtension = Input::file($file)->getClientOriginalExtension();
            $fileName = time() . uniqid() . "." . $fileExtension;
            $destinationPath = public_path($path);
            Input::file($file)->move($destinationPath, $fileName);
            return $fileName;
        } else {
            return null;
        }
    } */
}
