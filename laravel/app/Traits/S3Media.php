<?php

namespace App\Traits;

use App\Util\Util;
use App\Util\S3Util;

trait S3Media
{
    //requires getS3Path as a function
    function sendMediaToS3(){
        $medias = $this->getMedia();
        $that = $this;
        $s3Client = S3Util::getS3Client();
        foreach($medias as $media){
            $path = $this->getS3Path();
            $file_name = "{$path}/{$media->file_name}";
            $sourceFile = $media->getPath();
            $s3Client = $s3Client->putObject([
                'Bucket' => S3Util::BUCKET,
                'Key' => $file_name,
                'SourceFile' => $sourceFile,
                'ACL' => 'public-read',
            ]);
            $media->file_name = $file_name;
            $media->save();
            $sourceFile = $media->getPath();
            $media->disk="s3";
            $media->save();
            unlink($sourceFile);
        }
    }
}
