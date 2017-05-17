<?php

foreach(range(1,3) as $index => $num){
    //COmmunity
    echo "INSERT INTO property_photo(property_id,name,image,photo_type_id,display_order) ";
    echo "VALUES(598,'Image number {$num}','ext{$num}.jpg',3,{$num}); ";
    //Main
    echo "INSERT INTO property_photo(property_id,name,image,photo_type_id,display_order) ";
    echo "VALUES(598,'Image number {$num}','int{$num}.jpg',1,{$num}); ";
}
