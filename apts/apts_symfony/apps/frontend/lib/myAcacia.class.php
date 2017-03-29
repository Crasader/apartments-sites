<?php

class myAcacia
{
	private $properties = array(
		//'14FAR',
		'86PHR',
		'87ALL',
		'89VLP',
		'88WDM',
		'93TDS',
		'209VER',
		'43CC1',
		'156CRO',
		'42EGA', //Eastgate NV
		//'40EC1', //Eagle Crest
		'46SPA', //Sahara Palms NV
		'45PPA', //Palms at Peccole Ranch NV
		'157RET', //The Retreat NV
		'48SWA', //Silverwood NV
		'49VMV', //Villas At Mountain Vista NV
		'640ALP', //Alpine Meadows UT
		'611FSR', //Fairstone at Riverview UT
		'03HWD', //Hunters Woods UT
		'641ISH', //Irving Schoolhouse UT
		'94GWA', //Gentrys Walk AZ
		'92WAT', //Waterford Place AZ
		'211CHC', //Chandler Court AZ
		'212RIR', //River Ranch AZ
		'206ARG', //Argenta AZ
		'91WSV', //Woodstream Village AZ
		'90WCA', //Willowcreek AZ
		'452ONE', //One Thousand 8th Avenue WA
		'442BSR', //Bridges at San Ramon CA
		'24WAS', //Wasatch Club UT
		'459KIN', //The Knolls at Inglewood Hill WA
		'448UCA', //UCA SOCAL
		'409UCE', //UCE SOCAL
		'18CVA', //Chatham Village SOCAL
		'200VMO', //Vista Montana AZ
		'453EDG', //Edgewood Park WA
		'506FTE' , //Fashion Terrace SOCAL
		'441LAV', //La Vina Apartments in Livermore, CA
		'15FRE', //Fremont Glen in Fremont, CA
		'505LWG', //Legacy at Westglen, SOCAL

		'420IRO', //Ironwood CA
		'460MET', //Metropolitan Park WA
		'404HBR', //Harbor Cove CA
		'17SEA', //Seapointe SoCAL
		'65SPD', //The Springs of Dublin CA
		'434VRH', //The Villas at Rowland Heights SoCAL
		'423VSM', //The Villa at San Mateo CA
		'14FAR', //The Eleven Hundred CA
    '455QQQ', //Q WA
		'457PRK', //Park WA
		'456SMT', //Summit WA

		);
	public function isAcatia($propCode){
		if(in_array($propCode,$this->properties)){
			return true;
		} else {
			return false;
		}
	}
}
