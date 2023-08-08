<?php


namespace App\Http\Helpers;

use Illuminate\Support\Facades\Storage;

class S3
{
    public static function upload($file, $slug, $type)
    {
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $extension;
            $folderPath = $type . '/';
            $filePath = $folderPath . $filename;
            $disk = Storage::disk('s3');
            // Kiểm tra nếu folder chưa tồn tại thì tạo mới
            if (!$disk->exists($folderPath)) {
                $disk->makeDirectory($folderPath);
            }
            // Lưu file lên Amazon S3 bằng phương thức storeAs
            $disk->putFileAs($folderPath, $file, $filename, 'public');
            // Trả về đường dẫn ảnh đã lưu
            return $filePath;
        }
    }

    public static function delete($path)
    {
        Storage::disk('s3')->delete($path);
    }
}
