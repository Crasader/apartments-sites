<?php
namespace App\Interfaces;

interface IDataFetcher
{
    public function loadResource($type, $site);
}
