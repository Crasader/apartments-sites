<?php
namespace App\Property\Gallery;
use Illuminate\Database\Eloquent\Model;

class Details extends Model {
  protected $table = 'property_gallery_details';
  protected $fillable = [
    'str_title','str_description',
    'image_name','display_order','image_type'

  ];
  public function updateOrInsert(array $obj,$on='image_name'){
    $foo = self::where($on,$obj[$on])->get();
    if(count($foo))
      $target = $foo;
    else
      $target = new self();
    foreach($obj as $key => $value)
      if(in_array($key,$this->fillable))
        $target->{$key} = $value;
    try{
      $target->save();
    }catch(\Exception $e){
      echo $e->getMessage();
      return false;
    }
    return true;
  }

}
 ?>
