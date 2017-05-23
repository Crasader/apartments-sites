<html>
    <body>
    <h1>Google</h1>
        <form id='form1' method='post' action='/admin/places/placeid'>
            <label for='placeid'>Enter a place id: </label>
            <input type='text' name='placeid'  value="<?php if (isset($placeId)) {
    echo $placeId;
}?>">
            <input type='submit'>
            <input type='hidden' name='type' value='<?php echo \App\Reviews::GOOGLE;?>'>
            {{csrf_field()}}
         </form>
    <hr>
    <a href="https://developers.google.com/places/web-service/place-id" target=_blank>Search for a place ID</a>
    <hr>
    <h1>Yelp</h1>
        <form id='form1' method='post' action='/admin/places/placeid'>
            <label for='placeid'>Enter a place id: </label>
            <input type='text' name='placeid' value="<?php if (isset($yelpPlaceId)) {
    echo $yelpPlaceId;
}?>">
            <input type='submit'>
            <input type='hidden' name='type' value='<?php echo \App\Reviews::YELP;?>'>
            {{csrf_field()}}
        </form>

    </body></html>
