<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Legacy\Property;
use App\Property\Entity;
use App\Property\Template;
use App\Property\Group;

class AddApartmentUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $jsons = [];
        $jsons['brady'] = '
        {
            "property":
                {
                    "code": "TESTBB",
                    "name": "Willow Cove",
                    "address": "9300 S. Redwood Rd.",
                    "city": "West Jordan",
                    "state_id": "47",
                    "zip": "84088",
                    "phone": "(801)562-1770",
                    "fax": "(801)561-4612",
                    "email": "brady@marketapts.com",
                    "image": "f9c95aefc581033cb0f411bab324a418.jpg",
                    "url": "http:\/\/www.bradyapts.ddns.net\/",
                    "price_range": "$829-$1209",
                    "unit_type": "1-3 Bedrooms",
                    "special": "",
                    "mercial": "\/flash\/willow.html",
                    "description": "<p style=\"margin: 0in 0in 0pt\" class=\"MsoNormal\"><font face=\"Times New Roman\" size=\"3\">Relish in the value of living at Willow Cove. Our spacious, energy efficient 1, 2 and 3 bedroom apartment homes are sure to satisfy your desire for the perfect apartment home.Willow Cove is close to the freeway and TRAX saving you time and money.Only a few apartments left so stop by today!<\/font><\/p>",
                    "hours": "M-F: 9:00 AM - 6:00 PM <br \/>Sat: 10:00 AM - 4:00 PM <br \/>Sun: Closed ",
                    "pet_policy": "We welcome your pets! 1 pet: $400 pet fee & $35 monthly. 2 pets:$600 pet fee & $50 monthly. Breed restrictions do apply.\r\n",
                    "directions": "From I-15: Take 90th South exit. Turn west on 90th South and go to Redwood Road. Turn left (south) and travel about 3 blocks. Willow Cove is on the right. ",
                    "featured": "0",
                    "status_id": "2",
                    "corporate_group_id": "1",
                    "devurl": null
                },

            "property_entity":
            {
            	"property_group_id": "1",
            	"property_name": "Willow Cove",
            	"filesystem_id": "testbb-willow-cove",
            	"fk_template_id": "1",
            	"redis_alias": null
            }
            }
        ';


        $jsons['will'] = '
        {
            "property":
            {
                "code": "TESTWM",
                "name": "Willow Cove",
                "address": "9300 S. Redwood Rd.",
                "city": "West Jordan",
                "state_id": "47",
                "zip": "84088",
                "phone": "(801)562-1770",
                "fax": "(801)561-4612",
                "email": "william@marketapts.com",
                "image": "f9c95aefc581033cb0f411bab324a418.jpg",
                "url": "http:\/\/www.willapts.ddns.net\/",
                "price_range": "$829-$1209",
                "unit_type": "1-3 Bedrooms",
                "special": "",
                "mercial": "\/flash\/willow.html",
                "description": "<p style=\"margin: 0in 0in 0pt\" class=\"MsoNormal\"><font face=\"Times New Roman\" size=\"3\">Relish in the value of living at Willow Cove. Our spacious, energy efficient 1, 2 and 3 bedroom apartment homes are sure to satisfy your desire for the perfect apartment home.Willow Cove is close to the freeway and TRAX saving you time and money.Only a few apartments left so stop by today!<\/font><\/p>",
                "hours": "M-F: 9:00 AM - 6:00 PM <br \/>Sat: 10:00 AM - 4:00 PM <br \/>Sun: Closed ",
                "pet_policy": "We welcome your pets! 1 pet: $400 pet fee & $35 monthly. 2 pets:$600 pet fee & $50 monthly. Breed restrictions do apply.\r\n",
                "directions": "From I-15: Take 90th South exit. Turn west on 90th South and go to Redwood Road. Turn left (south) and travel about 3 blocks. Willow Cove is on the right. ",
                "featured": "0",
                "status_id": "2",
                "corporate_group_id": "1",
                "devurl": null
            }
            ,
            "property_entity":
            {
                "property_group_id": "1",
                "property_name": "Willow Cove",
                "filesystem_id": "testwm-willow-cove",
                "fk_template_id": "1",
                "redis_alias": null
            }
        }
        ';
        $propertyTemplateJson = '
        {
            "property_id": "3",
            "logo_image": "177a427f114513a103c1084912c5ce30.png",
            "home_image": "f89262c6eedb538087aec9771cdb10d0.jpg",
            "welcome": "Willow Cove Apartments in West Jordan, UT",
            "description": "<p><font face=\"verdana\">Leave the hustle and bustle behind you and retreat to a beautiful, tranquil setting at <b>Willow Cove Apartments in West Jordan, UT<\/b>. Our convenient West Jordan location puts you in the heart of serenity and security and is the perfect place to call home! Close to I-15 and Bangerter Highway, <b>Willow Cove<\/b> gives you convenience and comfort! This first class experience is waiting for you in this top <b>Utah Apartment<\/b>.\r\n\r\n<b>West Jordan\'s Top Apartment Complex<\/b> offers 1, 2, & 3 bedroom, one-of-a-kind <a href=\"\/floorplans\" alt=\"West Jordan Apartments\" Title=\"West Jordan Apartments\"><b>floor plans<\/b><\/a> were thoughtfully designed to suit your every need! There are several valuable <a href=\"\/features\" alt=\"West Jordan Apartments\" Title=\"West Jordan Apartments\"><b>amenities<\/b><\/a> to appreciate day to day such as large bedrooms with walk-in closets, air conditioning, dishwashers, private patios and balconies, washer and dryer hookups in units and much, much more! \r\n\r\nAt <b>Willow Cove Apartments<\/b> you can feel at ease with our professional and responsive staff members! We offer a wide array of fun and recreation. Enjoy yourself in the <b>Beach Entry Pool<\/b>, or relax in the year-round outdoor hot tub surrounded by beautiful landscaping. The kids will enjoy the Playground Fortress while you are keeping fit in the fully loaded fitness and yoga center. You will find our 1, 2, & 3 bedroom apartments. We pride ourselves in ensuring only the best in apartment living. Come see why <b>Willow Cove Apartment Complex<\/b> is your first choice to call home. Let us show you around! You will be happy you visited this <b>West Jordan Apartment Community<\/b>!<\/p><\/font>\r\n",
            "announcements": "Come in today to reserve your new home!\r\n<li><a href=\"https:\/\/goo.gl\/JAKUMS?&dr=http:\/\/www.willowcoveapts.net\" data-icon=\"b\" class=\"icon\" title=\"google\" alt=\"google\" target=\"_blank\"> Write a Review<\/a><\/li> ",
            "style_color": "#1393A7",
            "background_color": "#625542",
            "chat": "",
            "rentalapp_file": "a1d4360754328772f0c027b52648c1a3.doc",
            "map_html": "http:\/\/maps.google.com\/maps?f=q&source=s_q&hl=en&geocode=&q=9300+S.+Redwood+Rd.++West+Jordan,+UT+84088&sll=33.409326,-111.899431&sspn=0.011356,0.023732&ie=UTF8&hq=&hnear=9300+S+Redwood+Rd,+West+Jordan,+Salt+Lake,+Utah+84088&z=16",
            "map_frame_src": "http:\/\/maps.google.com\/maps?f=q&source=s_q&hl=en&geocode=&q=9300+S.+Redwood+Rd.++West+Jordan,+UT+84088&sll=33.409326,-111.899431&sspn=0.011356,0.023732&ie=UTF8&hq=&hnear=9300+S+Redwood+Rd,+West+Jordan,+Salt+Lake,+Utah+84088&z=16&ll=40.581841,-111.941145&output=embed",
            "community_image": "5883d2008d355ad5bc7e94b9525f11cb.jpg",
            "community_description": "Relish in the value of living at Willow Cove.  Our spacious, energy efficient 1, 2 and 3 bedroom apartment homes are sure to satisfy your desire for the perfect apartment home.  Willow Cove is close to the freeway and TRAX saving you time and money.  Only a few apartments left so stop by today!",
            "community_attractions_list": "",
            "custom_page_name": "",
            "custom_page_perma_link": "",
            "custom_page_content": "",
            "home_flash": null,
            "tracking_code": "<script type=\"text\/javascript\">\r\n\r\n  var _gaq = _gaq || [];\r\n  _gaq.push([\'_setAccount\', \'UA-7794421-42\']);\r\n  _gaq.push([\'_trackPageview\']);\r\n\r\n  (function() {\r\n    var ga = document.createElement(\'script\'); ga.type = \'text\/javascript\'; ga.async = true;\r\n    ga.src = (\'https:\' == document.location.protocol ? \'https:\/\/ssl\' : \'http:\/\/www\') + \'.google-analytics.com\/ga.js\';\r\n    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);\r\n  })();\r\n\r\n<\/script>",
            "contact_email_text": "We appreciate your inquiry here at Willow Cove Apartments. An associate will contact you shortly to answer any questions you may have.",
            "show_walkscore": "1",
            "email": "willowcove@amcllc.net",
            "facebook_url": "<-multi->\r\nfacebook~http:\/\/facebook.com\/willowcoveapartments\r\ngoogle~https:\/\/plus.google.com\/+WillowCoveApartmentsWestJordan",
            "acacia_home1_desc": null,
            "acacia_features_desc": null,
            "acacia_home2_desc": null,
            "acacia_home3_desc": null,
            "acacia_floorplan_desc": null,
            "acacia_ebrochure_desc": null,
            "latitude": "40.582182",
            "longitude": "-111.940556",
            "online_application_url": "https:\/\/www.runningreports.com\/rpgsp\/aolpolicy.html?Token=3U32LC85JV",
            "property_code_list": "",
            "e_brochure": null,
            "src_3dtour": "",
            "home_photo_desc": "",
            "gmap_key": ""
        }
        ';
        $property_id = 0;
        $propertyTemplateJson = json_decode($propertyTemplateJson);
        foreach ($jsons as $name => $json) {
            $tables = json_decode($json);
            foreach ($tables as $table_name => $jsonTable) {
                switch ($table_name) {
                    case 'property':
                        $table = new Property;
                        break;
                    case 'property_entity':
                        $table = new Entity;
                        $table->fk_legacy_property_id = $property_id;
                        break;
                    default:
                        throw new Exception('failed loading table');
                }
                foreach ($jsonTable as $key => $value) {
                    $table->{$key} = $value;
                }
                if ($table_name == 'property_entity') {
                    $propertyGroup = Group
                        ::where('str_identifier', 'dinali')
                        ->first();
                    $table->property_group_id = $propertyGroup->id;
                }
                $table->save();
                if ($table_name == 'property') {
                    if ($table->id) {
                        $property_id = $table->id;
                        $template = new Template;

                        foreach ($propertyTemplateJson as $key => $value) {
                            $template->{$key} = $value;
                        }
                        $template->property_id = $property_id;
                        $template->save();
                    }
                }
            }
        }
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        //
    }
}
