<?php
namespace App\Property\Text;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Property\Site;

class TextScope implements Scope {
    public function apply(Builder $builder, Model $model){
        $builder->where('entity_id', '=', Site::$instance->getEntity()->id);
    }
}
