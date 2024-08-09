<?php 
namespace App\Services;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Str;

class CloundinaryService {
    public function upload($file, $folder) {
        $image = Cloudinary::upload($file->getRealPath(), [
            'folder' => $folder
        ]);

        $url = $image->getSecurePath();

        return $url;
    }

    public function delete($url) {
        $publicId = $this->extractPublicIdFromUrl($url);
        Cloudinary::destroy($publicId);
        return true;
    }

    private function extractPublicIdFromUrl($url)
    {
        $path = parse_url($url, PHP_URL_PATH);

        $result = Str::after($path, env('CL_ID'));

        $result = Str::beforeLast($result, '.');

        return $result;
    }

}