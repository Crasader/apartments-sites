<?php

namespace Tests\Reviews;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Mailer\Queue;
use App\Util\Util;
use App\System\Session as Sesh;
use App\Mock;
use App\Reviews;
use App\Legacy\Property as Legacy;

class ReviewsTest extends TestCase{
    /* Data provider for endpoints. See https://phpunit.de/manual/current/en/phpunit-book.html#writing-tests-for-phpunit.data-providers */
    public function endpointProvider(){
        $baseUrl = 'https://www.mockapts.ddns.net/';
        return [
            'get url' => [$baseUrl,'get',200],
            'pull url' => [$baseUrl,'pull',200],
            'list url' => [$baseUrl,'list',200],
        ];
    }

    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint($baseUrl,$endpoint,$statusCode)
    {
        /**
         * This function simply checks that the endpoints are returning HTTP/1.1 200
         */
        $response = $this->call('get', $baseUrl . 'api/reviews/' . $endpoint);
        $this->assertEquals($response->getStatusCode(),$statusCode);
    }//end function

    public function reviewsProvider(){
        /**
         * Clear reviews for the current MOCK property
         */
        $app = $this->createApplication();
        $baseUrl = env('PHPUNIT_BASE_URL');
        $legacy = $app->make('App\Legacy\Property')->
            where('url','like',"%$baseUrl%")
            ->first();
        if(!$legacy){
            throw new \Exception("No property setup for: " . $baseUrl);
        }

        $r = new Reviews;
        $r->fk_legacy_property_id = $legacy->id;
        $r->rating = 5;
        $r->author_name = 'Test User';
        $r->author_url = 'https://www.google.com/';
        $r->language = 'en';
        $r->relative_time_description = '2 months ago';
        $r->text_body = Util::repeatAndRandomize(['foo','bar','lorem','ipsum','fizz','buzz']);
        $r->place_type = Reviews::FACEBOOK;
        $r->save();

        return [
            'simple review (Two identical results)' => [
                    function() use($legacy){ 
                        return [
                            [
                                'fk_legacy_property_id' => $legacy->id,
                                'rating' => 5,
                                'author_name' => 'Dr Pepper',
                                'author_url' => 'https://facebook.com/drpepperuser1',
                                'language' => 'en',
                                'relative_time_description' => '7 months ago',
                                'text_body' => 'From the space, vaulted ceilings (2nd floor), skylight in my master bathroom, washer and ' . 
                                    'dryer in the apt and lovely fireplace, this complex had it all.',
                                'place_type' => Reviews::FACEBOOK
                            ]
                        ];   
                    },2,$clear=true
                ],
            'simple review (Google + Facebook Reviews)' => [
                    function() use($legacy) {
                        return [
                            [
                            'fk_legacy_property_id' => $legacy->id,
                            'rating' => 5,
                            'author_name' => 'Google User 1',
                            'author_url' => 'https://google.com/googleuser1',
                            'language' => 'en',
                            'relative_time_description' => '10 minutes ago',
                            'text_body' => 'I wish I had more thumbs so I could give this apartment 4 thumbs up!' . 
                                "Honestly, I wish I could give this place SIX stars. They really go above and beyond. My room mate and I were in deep trouble one month and we couldn't pay our rent on time. The property management staff gave us until the end of the month to pay our rent. The even gave us a credit for some things that went wrong in the beginning? What other place would bend over backwards and practically break their backs to help their tenants. We are much appreciative of the work Cynthia Cullum and Rose Fiumara do to ensure we have a pleasant stay at Martinique Bay. I would recommend this place to anyone and everyone. It's like family here. People are so friendly and we couldn't ask for anything better. 

                                God bless the staff here.
                            ",
                            'place_type' => Reviews::GOOGLE
                            ],
                            [
                            'fk_legacy_property_id' => $legacy->id,
                            'rating' => 5,
                            'author_name' => 'Facebook User|12312312321',
                            'author_url' => 'https://www.facebook.com/facebookuser',
                            'language' => 'en',
                            'relative_time_description' => '3 seconds ago',
                            'text_body' => "I've lived in a Martinique Bay Apartment for roughly a year and a half and the complex has gotten better in some areas and worse in others. The following review is done as clinically as possible to avoid any extreme subjectivity.

                            Pros:
                            Nice area close to grocery, shopping center, and recreation areas
                            Pet friendly
                            Friendly Staff (both office and maintenance)
                            Gated entrances
                            Pest control on request every week during pest seasons

                            Cons:
                            Complex does not enforce some posted rules such as noise hours and towing
                            Management has changed recently and increased the rent from reasonable mid level rates to higher than average rental rates
                            large population of roaches outside of homes during evenings (controlled by outside company)
                            Gated front entrance breaks often (3-5 times in my 1 and 1/2 year of residency)

                            Personal Story(positive):
                            Trixie and Rose of the Martinique Bay Apartment staff as well as the maintenance are very kind and hard working individuals. Any normal need I have for repairs or improvements to my apartment are done promptly and completely with no complaints, even during rush times.

                            I have asked for AC filters changed, lights changed to LED (for electrical bills), light switch repairs, pest control sprays, bathtub repairs, floor repairs, and door repairs. All have been done in a timely manner and if it is something an outside company has to do, it is done promptly and if it is not done correctly, I have never had an issue requesting the company come again to finish the job.

                            Personal Story(negative):

                            Recently the individuals who have moved into the complex in my area have been of a lower quality than previous residents. One of these families has a child who is neglected and left to his own devices. During one of these periods of neglect, the child hurled rocks at vehicles in the parking area from the patio of his apartment. This damaged my vehicle and a neighbors. Normally this would not be an issue with the complex or management, however in this instance the new manager, Cynthia, refused to provide any information to assist with the repairs of my vehicle such as name of resident(s) and insurer information without a subpoena (which if you are unaware is a catch 22 as you need a court case to file a subpoena but you need the names of the perpetrator to start a court case). Even with 2 witnesses to the child throwing the rocks, the complex refused to reprimand the residents and I have been forced to move my vehicle to an opposing parking area further from my home for fear of future damages to my vehicle as well as take the tenants to small claims court as well as I have been asked to not speak with the tenants or about the tenants to other neighbors by the complex as well as having been requested not to go near their property, restricting my freedom of speech and movement. The moral of this is, if a tenant harms you, your property, or your pets, don't expect the new management to assist you.

                            Overall this is a great complex with great staff, the new management is a little in over their heads and still finding their footing but although I have had issues with assistance from the management, they are kind and hard working as well as understanding on most issues. The only real complaints I have or have heard from other tenants are the new residents moving in don't seem to be of high quality which is more a fault of the parent company who owns the complex pushing the current management to fill the apartments and as they say \"don't let a few bad apples spoil the bunch\". If the complex required people to have a more intense background check or if the rules were enforced more diligently it would be a very high quality complex for the price.

                            I recommend these complexes for first time renters and individuals but would not recommend it for families with children.",
                            'place_type' => Reviews::FACEBOOK
                            ],

                        ];
                    },1,$clear = true
            ]
        ];
    }

    /**
     * @dataProvider reviewsProvider
     */
    public function testDatabaseFetchingFromReviews($closureOrObject,$times,$clear){
        /* Clear all the reviews for the current property */
        Reviews::where('fk_legacy_property_id',Util::legacy(env('PHPUNIT_BASE_URL'))->id)
                ->each(function($foo,$bar){
                    $foo->delete();
                });
        $legacyId = Util::legacy(env('PHPUNIT_BASE_URL'))->id;
        $reviews = Reviews::where('fk_legacy_property_id',$legacyId)->get();
        $this->assertEquals(count($reviews),0,'Clearing the reviews for the current property failed');

        $originalCollection = [];
        if(is_callable($closureOrObject)){
            for($i = 0; $i < $times;$i++){
                foreach($closureOrObject() as $innerIndex => $innerArray){
                    $r = new Reviews;
                    foreach($innerArray as $key => $value){
                        $r->$key = $value;
                    }
                    $r->save();
                    $originalCollection[$r->id] = $r->toArray();
                }
            }
        }else{
            throw new \Exception("Cannot call closure! Please check reviewsProvider function!");
        }
            
        $response = $this->call('get','https://www.' . env('PHPUNIT_BASE_URL') . 'api/reviews/get');
        $this->assertEquals(200,$response->getStatusCode());
        $content = $response->getContent();
        $json = json_decode($content,true);
        $data = Util::arrayGet($json,'data');
        foreach($data as $index => $row){
            $this->assertTrue(isset($originalCollection[$row['id']]));
        }
    }

    public function pullReviewsProvider(){
        return [
            'fetching facebook without proper tokens' => [
                Reviews::FACEBOOK,  /* Type */
                'No access Token', /* Error message */
            ]
        ];
    }

    /**
     * @dataProvider pullReviewsProvider
     */
    public function testAttemptsToPullWillFailWithoutValidCredentials($type,$errorMessage){
        $response = $this->call('get','https://www.' . env('PHPUNIT_BASE_URL') . 'api/reviews/pull?platforms[]=' . $type);

    }
}
