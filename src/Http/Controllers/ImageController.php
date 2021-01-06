<?php

namespace Gabrieliuga\Markdownextra\Http\Controllers;

use Gabrieliuga\Markdownextra\Http\Requests\ImageUploadRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function uploadImage(ImageUploadRequest $request)
    {
        $imageFile = $request->file('image');
        if ($imageFile->isValid()) {
            $newName = $imageFile->storePublicly('public'.DIRECTORY_SEPARATOR.config('markdownextra.image_folder'), ['disk' => config('markdownextra.disk')]);
            if ($newName !== false) {
                $fileBits = explode(DIRECTORY_SEPARATOR, $newName);
                $newFilename = Storage::disk(config('markdownextra.disk'))->url(config('markdownextra.image_folder').DIRECTORY_SEPARATOR.end($fileBits));
                return new JsonResponse([
                    'success' => 1,
                    'file' => [
                        'url' => asset($newFilename),
                        'filename' => $imageFile->getClientOriginalName(),
                        'size' => $imageFile->getSize(),
                        'mime' => $imageFile->getMimeType(),
                    ]
                ]);
            } else {
                return new JsonResponse([
                    'error' => 1,
                    'message' => 'Failed to save the file',
                ]);
            }
        }
        return new JsonResponse([
            'error' => 1,
            'message' => 'You probably sent an invalid file :)',
        ]);

    }
}
