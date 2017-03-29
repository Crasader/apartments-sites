<?php 
class customForwardFilter extends sfFilter
{
  public function execute($filterChain)
  {
		$arrForwards = array('aptsarizona.com'=>'http://www.amcapartments.com/property/list/view/state/code/AZ',
		'aptsarkansas.com'=>'http://www.amcapartments.com',
		'aptsarvada.com'=>'http://www.amcapartments.com/property/list/view/city/code/Arvada',
		'aptsaurora.com'=>'http://www.amcapartments.com/property/list/view/city/code/Aurora',
		'aptsbolingbrook.com'=>'http://www.amcapartments.com/property/list/view/city/code/Bolingbrook',
		'aptsburbank.com'=>'http://www.amcapartments.com/property/list/view/city/code/Burbank',
		'aptsca.com'=>'http://www.amcapartments.com/property/list/view/state/code/CA',
		'aptscarsoncity.com'=>'http://www.amcapartments.com',
		'aptscasper.com'=>'http://www.amcapartments.com/property/list/view/city/code/Casper',
		'aptscastlerock.com'=>'http://www.amcapartments.com',
		'aptschandler.com'=>'http://www.amcapartments.com/property/list/view/city/code/Chandler',
		'aptscolorado.com'=>'http://www.amcapartments.com/property/list/view/state/code/CO',
		'aptscostamesa.com'=>'http://www.amcapartments.com/property/list/view/city/code/Costa+Mesa',
		'aptsdalycity.com'=>'http://www.amcapartments.com/property/list/view/city/code/Daly+City',
		'aptsdenver.com'=>'http://www.amcapartments.com/property/list/view/city/code/Denver',
		'aptsdublin.com'=>'http://www.amcapartments.com/property/list/view/city/code/Dublin',
		'aptsfederalheights.com'=>'http://www.amcapartments.com',
		'aptsflagstaff.com'=>'http://www.amcapartments.com/property/list/view/city/code/Flagstaff',
		'aptsfortcollins.com'=>'http://www.amcapartments.com',
		'aptsfresno.com'=>'http://www.amcapartments.com/property/list/view/city/code/Fresno',
		'aptshanoverpark.com'=>'http://www.amcapartments.com/property/list/view/city/code/Hanover+Park',
		'aptshayward.com'=>'http://www.amcapartments.com/property/list/view/city/code/Hayward',
		'aptshenderson.com'=>'http://www.amcapartments.com/property/list/view/city/code/Henderson',
		'aptshuntingtonbeach.com'=>'http://www.amcapartments.com/property/list/view/city/code/Huntington+Beach',
		'aptsidaho.com'=>'http://www.amcapartments.com',
		'aptsillinois.com'=>'http://www.amcapartments.com/property/list/view/state/code/IL',
		'aptskansas.com'=>'http://www.amcapartments.com',
		'aptskentucky.com'=>'http://www.amcapartments.com',
		'aptslafayette.com'=>'http://www.amcapartments.com/property/list/view/city/code/Lafayette',
		'aptslakeviewterrace.com'=>'http://www.amcapartments.com/property/list/view/city/code/Lake+View+Terrace',
		'aptslasvegas.com'=>'http://www.amcapartments.com/property/list/view/city/code/Las+Vegas',
		'aptslayton.com'=>'http://www.amcapartments.com/property/list/view/city/code/Layton',
		'aptslemongrove.com'=>'http://www.amcapartments.com/property/list/view/city/code/Lemon+Grove',
		'aptslogan.com'=>'http://www.amcapartments.com/property/list/view/city/code/Logan+',
		'aptsmesa.com'=>'http://www.amcapartments.com/property/list/view/city/code/Mesa',
		'aptsmichigan.com'=>'http://www.amcapartments.com',
		'aptsmidvale.com'=>'http://www.amcapartments.com/property/list/view/city/code/Midvale',
		'aptsminnesota.com'=>'http://www.amcapartments.com',
		'aptsmontana.com'=>'http://www.amcapartments.com',
		'aptsmontclair.com'=>'http://www.amcapartments.com',
		'aptsmorrison.com'=>'http://www.amcapartments.com',
		'aptsmurray.com'=>'http://www.amcapartments.com/property/list/view/city/code/Murray',
		'aptsnebraska.com'=>'http://www.amcapartments.com',
		'aptsnevada.com'=>'http://www.amcapartments.com/property/list/view/state/code/NV',
		'aptsnewmexico.com'=>'http://www.amcapartments.com',
		'aptsnorthcarolina.com'=>'http://www.amcapartments.com',
		'aptsnorthhighlands.com'=>'http://www.amcapartments.com',
		'aptsnorthlasvegas.com'=>'http://www.amcapartments.com/property/list/view/city/code/North+Las+Vegas',
		'aptsogden.com'=>'http://www.amcapartments.com/property/list/view/city/code/Ogden',
		'aptsohio.com'=>'http://www.amcapartments.com/property/list/view/state/code/OH',
		'aptsoklahoma.com'=>'http://www.amcapartments.com',
		'aptsoregon.com'=>'http://www.amcapartments.com',
		'aptsorem.com'=>'http://www.amcapartments.com/property/list/view/city/code/Orem',
		'aptspalmdale.com'=>'http://www.amcapartments.com/property/list/view/city/code/Palmdale',
		'aptspennsylvania.com'=>'http://www.amcapartments.com',
		'aptsphoenix.net'=>'http://www.amcapartments.com/property/list/view/city/code/Phoenix',
		'aptspleasantgrove.com'=>'http://www.amcapartments.com/property/list/view/city/code/Pleasant+Grove',
		'aptsprovidence.com'=>'http://www.amcapartments.com/property/list/view/city/code/Providence',
		'aptsprovo.com'=>'http://www.amcapartments.com/property/list/view/city/code/Provo',
		'aptsreno.com'=>'http://www.amcapartments.com/property/list/view/city/code/Reno',
		'aptsriverton.com'=>'http://www.amcapartments.com/property/list/view/city/code/Riverton',
		'aptsrocksprings.com'=>'http://www.amcapartments.com/property/list/view/city/code/Rock+Springs',
		'aptssacramento.com'=>'http://www.amcapartments.com/property/list/view/city/code/Sacramento',
		'aptssaltlakecity.com'=>'http://www.amcapartments.com/property/list/view/city/code/Salt+Lake+City',
		'aptsslc.com'=>'http://www.amcapartments.com/property/list/view/city/code/Salt+Lake+City',
		'aptssouthcarolina.com'=>'http://www.amcapartments.com',
		'aptsstockton.com'=>'http://www.amcapartments.com/property/list/view/city/code/Stockton',
		'aptstaylorsville.com'=>'http://www.amcapartments.com/property/list/view/city/code/Taylorsville',
		'aptstempe.com'=>'http://www.amcapartments.com/property/list/view/city/code/Tempe',
		'aptstennessee.com'=>'http://www.amcapartments.com',
		'aptstustin.com'=>'http://www.amcapartments.com/property/list/view/city/code/Tustin+',
		'aptsutah.com'=>'http://www.amcapartments.com/property/list/view/state/code/UT',
		'aptsvacaville.com'=>'http://www.amcapartments.com/property/list/view/city/code/Vacaville',
		'aptswashington.com'=>'http://www.amcapartments.com/property/list/view/state/code/WA',
		'aptswendover.com'=>'http://www.amcapartments.com',
		'aptswestjordan.com'=>'http://www.amcapartments.com/property/list/view/city/code/West+Jordan',
		'aptswestminster.com'=>'http://www.amcapartments.com/property/list/view/city/code/Westminster',
		'aptswestvalleycity.com'=>'http://www.amcapartments.com/property/list/view/city/code/West+Valley+City',
		'aptswestvirginia.com'=>'http://www.amcapartments.com',
		'aptswisconsin.com'=>'http://www.amcapartments.com',
		'aptswyoming.com'=>'http://www.amcapartments.com/property/list/view/state/code/WY',
		'aptsaustin.com'=>'http://www.amcapartments.com',
		'aptsbaltimore.com'=>'http://www.amcapartments.com',
		'aptscalifornia.com'=>'http://www.amcapartments.com',
		'aptscharlotte.com'=>'http://www.amcapartments.com',
		'aptscolumbus.com'=>'http://www.amcapartments.com',
		'aptselpaso.com'=>'http://www.amcapartments.com',
		'aptsflorida.net'=>'http://www.amcapartments.com',
		'aptsfortworth.com'=>'http://www.amcapartments.com',
		'aptsgeorgia.net'=>'http://www.amcapartments.com',
		'aptshunter.com'=>'http://www.amcapartments.com',
		'aptsindianapolis.com'=>'http://www.amcapartments.com',
		'aptsjacksonville.com'=>'http://www.amcapartments.com',
		'aptslosangeles.com'=>'http://www.amcapartments.com',
		'aptsmemphis.com'=>'http://www.amcapartments.com',
		'aptsportland.com'=>'http://www.amcapartments.com',
		'aptssanantonio.com'=>'http://www.amcapartments.com',
		'aptssanfrancisco.com'=>'http://www.amcapartments.com',
		'aptssanjose.com'=>'http://www.amcapartments.com',
		'aptsseattle.com'=>'http://www.amcapartments.com',
		'aptstexas.net'=>'http://www.amcapartments.com',
		'aptstuscon.com'=>'http://www.amcapartments.com',
		'marketingapts.com'=>'http://www.amcapartments.com',
		'woodcreekapts.net'=>'http://www.amcapartments.com',
		'aptsbakersfield.com'=>'http://www.amcapartments.com/property/list/view/city/code/Bakersfield',
		'aptsbellevue.com'=>'http://www.amcapartments.com/property/list/view/city/code/Bellevue',
		'aptsbountiful.com'=>'http://www.amcapartments.com/property/list/view/city/code/Bountiful',
		'aptsbrandon.com'=>'http://www.amcapartments.com/property/list/view/city/code/Brandon',
		'aptscarolstream.com'=>'http://www.amcapartments.com/property/list/view/city/code/Carol+Stream',
		'aptscheyenne.com'=>'http://www.amcapartments.com/property/list/view/city/code/Cheyenne',
		'aptscincinatti.com'=>'http://www.amcapartments.com/property/list/view/city/code/Cincinnati',
		'aptscitrusheights.com'=>'http://www.amcapartments.com/property/list/view/city/code/Citrus+Heights',
		'aptscoloradosprings.com'=>'http://www.amcapartments.com/property/list/view/city/code/Colorado+Springs',
		'aptsfoxlake.com'=>'http://www.amcapartments.com/property/list/view/city/code/Fox+Lake',
		'aptsfremont.com'=>'http://www.amcapartments.com/property/list/view/city/code/Fremont',
		'aptsgilbert.com'=>'http://www.amcapartments.com',
		'aptsglendale.com'=>'http://www.amcapartments.com/property/list/view/city/code/Glendale',
		'aptsheber.com'=>'http://www.amcapartments.com/property/list/view/city/code/Heber',
		'aptshollywood.com'=>'http://www.amcapartments.com',
		'aptskansascity.com'=>'http://www.amcapartments.com',
		'aptslakewood.com'=>'http://www.amcapartments.com/property/list/view/city/code/Lakewood',
		'aptslakezurich.com'=>'http://www.amcapartments.com/property/list/view/city/code/Lake+Zurich',
		'aptslancaster.com'=>'http://www.amcapartments.com/property/list/view/city/code/Lancaster',
		'aptslivermore.com'=>'http://www.amcapartments.com/property/list/view/city/code/Livermore',
		'aptsmadison.com'=>'http://www.amcapartments.com',
		'aptsmorenovalley.com'=>'http://www.amcapartments.com/property/list/view/city/code/Moreno+Valley',
		'aptsnorthglenn.com'=>'http://www.amcapartments.com/property/list/view/city/code/Northglenn',
		'aptsoceanside.com'=>'http://www.amcapartments.com/property/list/view/city/code/Oceanside',
		'aptsontario.com'=>'http://www.amcapartments.com/property/list/view/city/code/Ontario',
		'aptspittsburgh.com'=>'http://www.amcapartments.com',
		'aptspleasanton.com'=>'http://www.amcapartments.com/property/list/view/city/code/Pleasanton',
		'aptsredlands.com'=>'http://www.amcapartments.com/property/list/view/city/code/Redlands',
		'aptsrichmond.com'=>'http://www.amcapartments.com/property/list/view/city/code/Richmond',
		'aptsriverside.com'=>'http://www.amcapartments.com/property/list/view/city/code/Riverside',
		'aptssandy.com'=>'http://www.amcapartments.com/property/list/view/city/code/Sandy',
		'aptssanmateo.com'=>'http://www.amcapartments.com/property/list/view/city/code/San+Mateo',
		'aptssanrafael.com'=>'http://www.amcapartments.com/property/list/view/city/code/San+Rafael',
		'aptssantaclara.com'=>'http://www.amcapartments.com',
		'aptssantarosa.com'=>'http://www.amcapartments.com/property/list/view/city/code/Santa+Rosa',
		'aptssarasota.com'=>'http://www.amcapartments.com/property/list/view/city/code/Sarasota',
		'aptsscottsdale.com'=>'http://www.amcapartments.com',
		'aptsshermanoaks.com'=>'http://www.amcapartments.com/property/list/view/city/code/Sherman+Oaks+',
		'aptsspringfield.com'=>'http://www.amcapartments.com',
		'aptsstgeorge.com'=>'http://www.amcapartments.com',
		'aptssunnyvale.com'=>'http://www.amcapartments.com/property/list/view/city/code/Sunnyvale',
		'aptsthornton.com'=>'http://www.amcapartments.com/property/list/view/city/code/Thornton',
		'aptswesthaven.com'=>'http://www.amcapartments.com/property/list/view/city/code/West+Haven',
		'aptswesthollywood.com'=>'http://www.amcapartments.com/property/list/view/city/code/West+Hollywood',
		'aptswhittier.com'=>'http://www.amcapartments.com/property/list/view/city/code/Whittier');
		//
		//'westwoodterraceapts.com'=>'http://www.amcapartments.com/Illinois/Moline/WestwoodTerrace/Apartments/373',
		//'ridgewoodtowersapts.com'=>'http://www.amcapartments.com/Illinois/EastMoline/RidgewoodTowers/Apartments/372',
		//);

	  function preg_grep_keys($pattern, $input, $flags = 0 ){
	    $keys = preg_grep( $pattern, array_keys( $input ), $flags );
	    if($keys){
		    $vals = array();
		    foreach ( $keys as $key )
		    {
		        $val = $input[$key];
		    }
	    } else {
	    	$val = "http://www.amcapartments.com";
	    }
	    return $val;
		}
    // Execute this filter only once
    if ($this->isFirstCall()){
    	//echo $_SERVER['HTTP_HOST'];
    	//exit;
    	if(!preg_match('/^.*amcapartments.com$/',$_SERVER['HTTP_HOST'])){
    		//echo preg_grep_keys('/^.*'.$_SERVER['HTTP_HOST'].'.*$/', $arrForwards, $flags = 0 );
    		//exit;
    		$host = preg_replace('/www\./','',$_SERVER['HTTP_HOST']);
				return $this->getContext()->getController()->redirect(preg_grep_keys('/^'.$host.'$/', $arrForwards, $flags = 0 ),0,301);
    	}
    }
 
    // Execute next filter
    $filterChain->execute();
  }
}