<?php

namespace App\Util;

use Redis;
use App\Property\Entity;
use App\Property\Site;
use Illuminate\Http\Request;
use Aws\S3\S3Client;
use App\Util\Util;

class S3Util
{
    const IMAGE_BASE = 'photos';
    const FLOORPLAN_BASE = 'floorplans';
    const BUCKET = 'mktapts';
    const LIVE_BASE = 'http://www.amclive/uploads';
    public static function getS3Client(){
        $options = [
            'region'            => 'us-west-2',
            'version'           => '2006-03-01',
            'signature_version' => 'v4',
            'credentials'   => [
                'key' => ENV('AWS_KEY'),
                'secret' => ENV('AWS_SECRET')
            ]
        ];

        return new S3Client($options);
    }
    public static function updatePhotos($site=null)
    {
        if ($site === null) {
            $site = app()->make('App\Property\Site');
        }
        $collection['photos'] = \DB::connection('live-mysql')->table('property_photo')->select('image')->where('property_id', $site->getEntity()->fk_legacy_property_id)->get();
        //$collection['neighborhood'] = \DB::connection('live-mysql')->table('property_neighborhood')->select('url')->where('property_id',$site->getEntity()->fk_legacy_property_id)->get();
        $collection['floorplans']  = \DB::connection('live-mysql')->table('property_floorplan')->select('image')->where('property_id', $site->getEntity()->fk_legacy_property_id)->get();
        chdir("/tmp");
        $serv = preg_replace("|[^a-z+]|", "", Util::serverName());
        $dir = "/tmp/$serv";
        @mkdir($dir);
        chdir($dir);
        echo shell_exec("whoami");
        $downloaded = [];
        $s3Client = self::getS3Client();
        shell_exec("rm -rf {$dir}/*");

        foreach (['photos' => [
                                'base' => self::IMAGE_BASE,
                                'target' => 'gallery'],
            /*
            'neighborhood' => [
                                'base' => self::NEIGHBORHOOD_BASE,
                                'target' => 'neighborhood'],
                                */
            'floorplans' => [
                'base' => self::FLOORPLAN_BASE,
                'target' => 'floorplans'
            ]
        ] as $type => $base) {
            foreach ($collection[$type] as $i => $file) {
                if ($type == 'neighborhood') {
                    $file->image = $file->url;
                }

                //echo "scp amcllc@amctun:/home/amcllc/amcapartments_com/amc/amc_symfony/web/uploads/" . {$file->image}

                shell_exec(
                $wget = "wget " . self::LIVE_BASE . "/" . $base['base'] . "/{$file->image} --output-file={$file->image}.log");
                if (file_exists("{$dir}/{$file->image}")) {
                    echo "File exists\n<br>";
                }
                echo shell_exec("ls -al {$file->image}");
                echo shell_exec("mv {$dir}/{$file->image} {$dir}/{$type}_{$file->image}");
                echo shell_exec("ls -al {$dir}/{$type}_{$file->image}");
                echo $wget . "\n<br>";
                echo file_get_contents("{$file->image}.log");
                try {
                    $result = $s3Client->putObject([
                        'Bucket'     => S3Util::BUCKET,
                        'Key'        => "images/" . $site->getEntity()->getTemplateName() . "/" . $site->getEntity()->getLegacyProperty()->code . "/" . $base['target'] . "/{$file->image}",
                        'SourceFile' => "$dir/{$type}_{$file->image}",
                        'ACL' => 'public-read',
                    ]);
                } catch (S3Exception $e) {
                    echo $e->getMessage() . "\n";
                }
                var_export($result);
                echo "\n<br>";
            }
        }
    }
}
