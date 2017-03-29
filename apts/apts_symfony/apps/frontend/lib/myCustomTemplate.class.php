<?php

class myCustomTemplate
{
  private $Acaciaproperties = array(
    //'14FAR',
    '86PHR',
    '87ALL',
    '89VLP',
    '88WDM',
    '93TDS',
    '43CC1', //Crystal Creek
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
    '423TVS', //The Villa at San Mateo CA
    '14FAR', //The Eleven Hundred CA
    '455QQQ', //Q WA
    '457PRK', //Park WA
    '456SMT', //Summit WA
    '217VLM', //2150 Arizona Ave South AZ
    '661LKV', //Lakeside Village UT
    '46RDT', //Rancho Destino LV
    '432VOG', //Village on the Green
    '22RNO', //Reno Vista
    '20RIB', //Riverbank
    '521CRL', //Camino Real
    '220OCT', //Ocotillo Bay
    '470VUE', //Vue Kirkland
    '223CBO',//Cabrillo
    '222CSF',//Casa Santa Fe
    '535NAN',//Nantucket
    '533BLV',//Bella Vista
    '534CLL',//The Carlyle
    );
  private $JSPproperties = array(
    '638ROF', //Royal Farms
    '26FWA', //Callaway
    '637ROR', //Royal Ridge
    '118AGA', //Alton Green
    '135BLN', //Bluesky Landing
    '407CVI', //Canyon Villa
    '351CYP', //Cypress Point
    '450HGR', //Highgrove
    '507LKS', //Lakeside Village
    '431LVI', //Lakeview Village
    '150LTA', //Lantana
    '516MIT', //Mission Trails
    '429MNT', //Montierra
    '134MVI', //Mountain Vista
    '638ROF', //Royal Farms
    '637ROR', //Royal Ridge
    '62SER', //Serramonte Ridge
    '415SDW', //Shadow Ridge
    '30SBA', //Shadowbrook
    '133REE', //Silver Reef
    '601SOV', //Somerset Village
    '408TNA', //Terra Nova
    '458CFL', //The Cove at Fishers Landing
    '813MRU', //The Meadows at River Run
    '357PAC', //The Park at Canyon Ridge
    '353TPI', //Torrey Pines
    '109WIN', //Villas at Parker
    '115WRI', //Westridge
    '451WRE', //Wildreed
    '60HTA', //Hillside Terrace
    '61MBA', //Mountainback
    '47POR', //Portola Del Sol
    '27SPR', //Springs Of Country Woods
    '302GLA', //The Glades
    '63TIM', //The Timbers
    '81WLA', //Westline
    '26FWY', //Fairway - Callaway
    '412KEN', //Kendallwood
    '80RSA', //Riverstone
    '58SOM', //Sommerset
    '602STW', //Southwillow
    '413SPH', //Springhouse
    '305TUS', //Tuscany Villas
    '116LAG', //Lodge at Aspen Grove
    '27SCW', //Springs of Country Woods
    '461ATM', //Autumn Chase
    '810CAB', //Camden at Bloomingdale
    '804PWC', //Parkway Commons
    '806RIT', //Ridgewood Towers
    '508RIO', //Rio Vista
    '811SPL', //Stratford Place
    '807WTA', //Westwood Terrace
    '550OJE', //One Jefferson
    '816FLS', //Fieldpointe at Schaumburg
    '462PSO', //Park South
    '85AGE', //The Arbors of Glen Ellyn
    '422PSC', //Parkside Commons
    '463KAR', //Karbon
    '117RBV', //Rockledge Bear Valley
    '552ABC', //Arbor Creek
    '465NCR', //Newport crossing
    '467PCV', //Pebble Cove
    '468LAT', //Latitude
    '138M2A', //M2 apartments
    '121LRY', //Stratford at Lowry
    '518BRD', //1125 Broadway
    '556PVF', //Powell Valley Farms
    '427VOA', //Village Oaks CA
    '447HTV', //Hawthorn Villages
    '523RDE', //Rancho del Rio
    '106CPE', //Center Pointe East
    '469ADD', //The Addison
    '361CBC', //The Crossings at Bear Creek
    '558TNE', //Terrene
    '105BCR', //The Bluffs at Castle Rock
    '559MOR', //Morrison
    '362ARC', //Arapahoe Club
    '363PHG', //The promenade at Hunters Glen
    '471ART',//Arterra
    '129HTH',// Hawthorne Hill
    '472MCP',//Meadows at Cascade Park
    //'501TWA',//The Woodlands
    '501WOD',//The Woodlands
    '528SDO',//Sierra Del Oro
    '529M65',//Metro Six 55
    '368LOA',//Legend Oaks
    '369SKC',//Skyecrest
    '473OFI',//Olin Fields
    '114AUG',//Aurora Green
    '478WED',//Waters Edge
    '477CVP',//Carriage Park
    '474CHO',//Carriage House
    '475WGL',//Walnut Grove Landing

    );
  private $newAMCproperties = array(
    '603FPL', //Foothill Place
    '01WIL', //Willow Cove
    '623SPI', //Sandpiper
    '755VMF', //The Village at Mission Farms
    '753HIG', //Highlands Lodge
    '926RVO', //River Oaks
    '902MER', //Meridian at Bowie
    '06COV', //Coventry Cove
    '53CAD', //Crossing at Daybreak
    '610SRT', //South Ridge Town Homes
    //'77LAK', //Miller Estates*
    '668DIO', //Palladio
    '557ANP', //Andover Park
    '645CCT', //Center Court
    '669TRN', //Thornhill
    '164MTB', //Martinique Bay
    '608RED', //The Redwood
    '464LLW', //The Ludlow
    //'644MEP', //Park Avenue
    '664MEP',//Meadows at Park Avenue
    '604CAP', //Park Capitol
    '604PKC', //Park Capitol
    '04CTY', //644 City Station
    '04CIS', //644 City Station
    '54APW', //Aspen Wood
    '02ATH', //Atherton Park
    '765LAH', //The Lodge
    '657BWA', //Barbara Worth
    '632BLK', //BlueKoi
    '639BRY', //The Mercer
    '620ELM', //Elmwood
    '11GGR', //Green Grove
    '75GPA', //Apartments on the Green
    '635HCV', //Hidden Cove
    '650HAH', //Huntington
    '76LMA', //Layton Meadows
    '72LEV', //Le Vail Chateau
    '642LEG', //Legacy Crossing
    '07LVA', //Legacy Village
    '19LEM', //Holliday on ninth
    '617LIB', //Liberty Heights
    '56LOG', //Logan Landing
    '50LPT', //Lookout Pointe
    '50LOP', //Lookout Pointe
    '28LOT', //Lotus
    '659LTP', //Lotus Park
    '79MRM', //Mountain Ridge Manor
    '70MTN', //Mountain Shadows
    '71PTP', //Mountain View
    '12PLE', //Pleasant Springs
    '12PSA', //Pleasant Springs
    '636PRE', //Preston Hollow
    '648RV1', //Ridgeview
    '616RWA', //Riverwalk
    '613SFA', //Santa Fe
    '607SET', //Settlers Landing
    '34SUN', //Sunnyvale
    '647HAR', //The Hills at Renaissance
    '663VGP', //Village Park
    '619WA1', //Wasatch Commons
    '619WAC', //Wasatch Commons
    '32WPA', //West Pointe
    '664WSA', //West Station
    '621WSP', //Wilshire Place
    '621WSH', //Wilshire Place
    '628WGT', //Woodgate
    '628WGA', //Woodgate
    '35BPA', //Hidden Pointe
    '29CLA', //CandleStick Lane
    '660CVC', //Canyon view Crossing
    '51CHR', //Christopher Village
    '658CIL', //City Line
    '05CSP', //Country Springs
    '627CKV', //Creekview
    '33CRH', //CrestHaven
    '78EBK', //Eastbrook
    '952KAL', //Kalaeloa
    '207A49', //Arcadia on 49th
    '213BRE', //Barrington Regent
    '202BEL', //Bella Solano
    '96CWS', //Coldwater Springs
    '218CCK', //Copper Creek
    '97CRY', //Crystal Creek AZ
    '204FGA', //Falcon Glen
    '205GPL', //Garden Place
    '858PKV', //Park Village
    '216THI', //The Highlands
    '95WTS', //Waterstone
    '927FLK', //Fair Lakes
    '643LCO', //Legacy Cottages of South Jordan
    '615MDR', //Madrona
    '112MPL', //52nd marketplace
    '125AUP', //Arista Uptown
    '137ASG', //Cherry Ridge
    '127CHY', //Cheyenne Crossing
    '99VEP', //Ventana Palms
    '673CLR', //Claradon Village
    '358BSQ', //Bridge Square
    '766FTH', //Fountainhead
    '132HPC', //Tuscan Heights
    '111LKE', //Lamar Station
    '110LOR', //Loretto Heights
    '350PAW', //Peaks of Woodmen
    '355REG', //Regatta
    '141SIP', //Sienna Place
    '122SIE', //Sierra Vista
    '126SKY', //Skyline View
    '113EMO', //The Emory
    '101GRO', //The Grove
    '107PCC', //The Preserve at City Center
    '114SUM', //Park Place at 92nd
    '102VWA', //Village West
    '670OQH', //Oquirrh Hills
    '751POP', //The Preserve at Overland Park
    '593SPT', //Sugar Pine Townhomes
    '592MDA', //Medallion
    '591OPL', //Orchard Place
    '208VMT', //Villages at Metro Center
    '951OAW', //Oasis Town Homes
    '901VOK', //Village Oaks
    '801COM', //The Commons
    '701RHP', //Reflections at highpoint
    '82CVG', //Casper Village
    '38SHA', //Sweetwater Heights
    '553HHL', //Honeyman Hardware Lofts
    '555JTR', //Jory Trail at the Grove
    '551SSC', //Stark Street Crossings
    '554PRS', //The Preserve
    '805APL', //Aspen Place
    '814LM1', //Liberty Meadow Estates
    '152BSC', //Sedona Ridge
    '163BPI', //Boulder Palms
    '167CHI', //Chapel Hill
    '154SHV', //St. Lucia
    '45ETP', //The Edge at Traverse Point
    '155VSE', //Villa Serena
    '162VGV', //Villas at Green Valley
    '153VAV', //Villas at Viking Road
    '443TRV', //Tralee Village
    '513MAC', //1400 McAlister
    '21SPG', //The Springs
    '410BRG', //Bridgecourt
    '59MED', //Media Center Villas
    '416MPK', //McInnis Park
    '419SCL', //Spring Club
    '418HDO', //Heather Downs
    '405WST', //Woodstream Townhomes
    '403CPL', //Campbell Plaza
    '425SRV', //Serena Vista
    '424AGL', //Autumn Glen
    '509VLA', //Vista la Rosa
    '16AND', //Marquee
    '504LPK', //Villas at Parkside
    '446SPB', //San Pedro Bank Lofts
    '580MVW', //Mountain View
    '775YRK', //Yorktown club
    '517FWN', //Four Winds
    '69SPN', //The Springs CA
    '515HVI', //Huntington Breeze
    '128BRK', //The Berkeley at Regis
    '675MNC', //Monaco
    '522TSQ', //The square
    '674VRT', //The village at raintree
    '13EST', //Estancia
    '160MTC', //Montecito
    '581BLM', //Blackmore
    '618HEA', //Highland East
    '633MME', //Mission Meadowbrook
    '67PCA', //Palm Chaparral
    '359PVT', //Parkview Terrace
    '166TBL', //Timberlake
    '445BPS', //Beverly Park Senior
    '136TMV', //3300 Tamarac
    '665GVS',//Grovecrest Villas
    '366LPL',//Lincoln Place
    '73MPA',//Mulberry Park
    '809BHI', //Brook Hill
    '677GST', //Goldstone Place
    '956PKI',//The Palms of Kilani
    '31AVA',//Avalon Senior Living
    '605PNA',//Prana
    '421GAH',//1001 Melrose
    '52CTL',//Country Lake
    '221RSF',//Rio Santa Fe
    '679BG1',//Bella Grace
    '100RCM',//Retreat at Cheyenne Mountain
    '130E13',//Eleven13
    '116HPK',//Heritage Park
    '520CSA',//The courtyard Senior
    '667RFT',//Riverfont
    '821LVT',//Lakeview Townhomes at Fox Valley
    '820CPR',//Cypress Place
    '508RVA',//Rio Vista
    '510HRI',//Harvest Ridge
    '511SRO',//Sunrose
    '624LCL',//Legacy Cottages of Layton
    '406TVI',//Tuscany Villa CA
    '354AX9',//Axis at Nine Mile Station
    '402VDR',//Luxe 1801
    '169LOF',//Lofts at 7100
    '66VND',//Veranda
    '957SUT',//Sunset Terrace
    '64SNV',//Sun Valley
    '171NAP',//Napoli
    '170BLO',//Bloom
    '172AVO',//The Avondale
    '173STS',//Solstice
    '174LID',//The Lido
    '175CPN',//Capri North and South
    '176TRY',//Torreyana
    '177TVE',//The Avenue
    '178PTH',//Parkway Townhomes
    '179VTG',//Vintage Pointe
    '808LKA',//Lakeside- IL
    '181LYR',//Lyric
    '676DVG',//Draper Village
    '356CLM',//Franklin Flats
    '401GTA',//Galleria Townhomes
    '490VES',//Veranda Estates
    '491VEK',//Veranda Knolls
    '433PCL',//Parc Clarmont
    //'609WNG',//Windgate
    '612WND',//Windgate
    '576AMA',//Aspen Meadows
    '305PHA',//Phoenix
    '439MTR',//Monterra Ridge
    '108CHE',//Cheyenne Crest
    '630GRH',//Greyhawk Townhomes
    '14SCA',//Stone Creek
    '527CMV',//Camden Village
    '203PSR',//La Privada
    '975CTO',//Carson Towers
    '629CLV',//The Calaveras
    '817WTO',//Westwind Towers
    '822ABR',//The Arbors of Brookdale
    '756CC6',//Country Club on 6th
    '702VCV',//Verandas at City View
    '601ASO',//Arches South
    '152TPC',//Trellis Park at Crossroads
    '35PAR',//Parkway Commons
    '65ETA',//Ethan Terrace
    '102WAH',//Westhills
    '444SFV',//South Fulton Village
    '850CHP',//Charles Place
    '875FTC',//Fort Chaplin Park
    '165AVI',//Avion at Sunrise Mountain
    '950WAK',//Waikele Towers
    '512ANC',//Anaheim Cottages
    '103APN',//Aspenwood - CO
    '903LVW',//Lakeview
    '803LLA',//Liberty Lake
    '201LIN',//Lindsay Palms
    '168TNP',//Lake Tonopah
    '625MA1',//Marmalade Hill
    '104CSC',//Mountain Ridge
    '215NPT',//Newport
    '304PRX',//Praxis of Deerfield Beach
    '700RAI',//Raintree Village
    '435SWD',//Summerwood
    '36VFA',//The 500 Apartments
    '671HTC',//The Braxton at Trolley Square
    '411CYN',//The Bungalows
    '656CPV',//The Cove at Pleasant View
    '609NEW',//The New Broadmoor
    '449RAM',//The Ridge at McClellan
    '631TMR',//Townhomes at Mountain Ridge
    '438VDG',//Villa de Guadalupe
    '685ACH',//The Arches
    '55JOT',//Joshua Tree
    '602SHN',//Shenandoah
    '629CLI',//Shenandoah
    '57CRK',//Crocker Oaks
    '530AMG',//Amber Grove
    '41SSV',//Sunrise Senior Village
    '154PCO',//Pebble Creek NV
    '516MVT',//Meritage Villas townhomes
    '158SPE',//Spectrum
    '582BIG',//Big Sky
    '84PSH',//Park Shadows
    '153MTE',//Monterra
    '98BYS',//BaySide
    '426BUR',//Burchard
    '109B25',//25 Broadmoor
    '161BRT',//Brittnae Pines
    '218VVG',//Val Vista Gardens
    '159MNV',//Mirasol
    '40PRT',//Portofino
    '683CLS',//Calaveras South
    '703CEN',//Central Park
    '561NWA',//Northwood
    '800CRG',//Carriage Court
    '209VER',//Verona Park
    '206ARG', //Argenta AZ
    'S18S15', //1521 Sherwin Ave
    '819S16', //1608 Sherwin Ave
    '524DWD', //Dover Woods
    '213FSP', //Fiesta Park
    '183BSL', //Bella Solara
    '184CMS', //The Commons
    '503VTU', //The Villas at Tustin


    );
    private $Cornerstoneproperties = array(
    //'110RP1', //Regis Place (117)
    '77LAK', //Miller Estates*
    '3370576', //The cove at overlake
    //'A1409000627', //Monaco
    'A0901001831', //The boulders
    'A1306000100', //Hampton Place
    'A1410000213', //Cherry Hill
    'A0901007370', //Logan Pointe
    '3975859', //Park at Legacy Trails
    'TOW', //Tower View
    '3888528', //2550 South Main
    'DAV',//Davis Town Homes
    '3113885',//Deer Creek
    '1015319',//Boulder Pines
    '3183149',//Holladay Hills
    '1015373',//Layton Pointe
    '74LSA',//Solara
    '2587409',//Village on Main Street Senior
    '1560016',//Village on Main Street
    '4006410',//Alder Creek Villas
    '4083743',//West Station
    '1092913',//Village at Rivers Edge
    '1048324',//Silver Pines
    'WILL',//The Willows

    );
//^(.*)\((.*)\)
//'$2', //$1

  public function isAcatia($propCode){
    if(in_array($propCode,$this->Acaciaproperties)){
      return true;
    } else {
      return false;
    }
  }
  public function isJSP($propCode){
    if(in_array($propCode,$this->JSPproperties)){
      return true;
    } else {
      return false;
    }
  }
  public function isAMC($propCode){
    if(in_array($propCode,$this->newAMCproperties)){
      return true;
    } else {
      return false;
    }
  }
  public function isCornerstone($propCode){
    if(in_array($propCode,$this->Cornerstoneproperties)){
      return true;
    } else {
      return false;
    }
  }
}
