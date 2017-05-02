<html>
    <body>
        <form id='form1' method='post' action='/admin/places/placeid'>
            <label for='placeid'>Enter a place id: </label>
            <input type='text' name='placeid'  value="<?php if(isset($placeId)){ echo $placeId; }?>">
            <input type='submit'>
            {{csrf_field()}}
         </form>
    <hr>
    <a href="https://developers.google.com/places/web-service/place-id" target=_blank>Search for a place ID</a>
    </body></html>
