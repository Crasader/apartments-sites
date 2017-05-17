<?php
namespace App\Traits;

trait ShellMigration {
    public function updateExec($line){
        $fn = 'exec.sh';
        if(!file_exists($fn)){
            $fileContents = '';
        } else {
                $fileContents = file_get_contents($fn);
        }
        if(strpos($fileContents, $line) === false){
            $className = get_class($this);
            $date = date('Y-m-d-H-i_s');
            $fileContents .= "
# {$date}: {$className}
{$line}
";
            file_put_contents('exec.sh', $fileContents);
        }
        print($line . "\n");

    }
}
