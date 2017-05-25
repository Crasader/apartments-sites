<?php
if(isset($places)){
    foreach($places as $i => $row){
        ${$row['place_type']} = $row['place_id'];
    }
}
?>
<html>
    <body>
    <h1>Google</h1>
        <form id='form1' method='post' action='/admin/places/placeid'>
            <label for='placeid'>Enter a place id: </label>
            <input type='text' name='google_placeid'  value="<?php if (isset($g)){ echo $g; }?>">
    <hr>
    <a href="https://developers.google.com/places/web-service/place-id" target=_blank>Search for a place ID</a>
    <hr>
    <h1>Yelp</h1>
            <label for='placeid'>Enter a place id: </label>
            <input type='text' name='yelp_placeid' value="<?php if (isset($y)) { echo $y; }?>">
            <input type='submit'>
            {{csrf_field()}}
        </form>

    </body></html>
