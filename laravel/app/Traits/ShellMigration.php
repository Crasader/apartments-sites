<?php
namespace App\Traits;

trait ShellMigration
{
    public function updateExec($lines)
    {
        $date = date('Y-m-d-H-i-s');
        $shellMigrationsDir = 'shell-migrations';
        $className = get_class($this);
        if(!is_dir($shellMigrationsDir)){
            mkdir($shellMigrationsDir);
        }
        $fn = "{$shellMigrationsDir}/{$date}-{$className}.sh";

        if(is_array($lines)){
            $lines = implode("\n", $lines);
        }
        $fileContents = "
# {$date}: {$className}
{$lines}
";
        file_put_contents($fn, $fileContents);
        print("bash {$fn}\n");
        // print($fileContents);
    }
}
