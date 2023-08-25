<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;


trait AttachFilesTrait
{
    public function uploadFile($request, $name, $folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs(
            'Attachments/',
             $folder . '/' . $file_name
             , 'public');
    }


    public function deleteFile($name, $folder)
    {
        $exists = Storage::disk('public')->exists('Attachments/' .  $folder . '/' . $name);

        if ($exists) {
            Storage::disk('public')->delete('Attachments/' .  $folder . '/' . $name);
        }
    }
}
