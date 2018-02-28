<?php

namespace itmanagement\Traits;

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use \Exception;

trait LogoTrait
{
    public function upload($file, $namespace = 'images'){
        return $file->store($namespace);
    }

    public function retrieve($model){
        $result = null;
        try {
            $key = $model->logos()->first()->path;
            $s3Client = new S3Client([
                'region' => env('AWS_DEFAULT_REGION'),
                'version'=> env('AWS_API_VERSION')
            ]);
            $result = $s3Client->getObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key'    => $key
            ]);
        }catch (AwsException $e) {
            report($e);
            return null;
        }catch (Exception $e){
            report($e);
            return null;
        }

        return $result['@metadata']['effectiveUri'];
    }


}