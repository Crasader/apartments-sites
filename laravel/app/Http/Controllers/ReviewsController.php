<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Site;
use App\Traits\PageResolver;
use App\Util\Util;
use App\System\Session;
use App\Reviews;

class ReviewsController extends Controller
{
    use PageResolver;
    protected $_allowed = [
       'get'  => 'handleGet',
       'pull' => 'handlePull',
    ];

    private function _end(string $path){
        $parts = explode("/",$path);
        return end($parts);
    }
    public function handle(Request $req,string $page){
        if(Util::arrayGet($this->_allowed,$stub = $this->_end($req->getPathInfo()),null) !== null){
            return $this->{$this->_allowed[$stub]}($req,$req->input());
        }
        return 'idk';
    }

    public function exists(array $params,array $keys){
        foreach($keys as $k){
            if(!isset($params[$k])){
                return false;
            }
        }
        return true;
    }

    protected function platforms(){
        return [
            Reviews::FACEBOOK => "facebook",
            Reviews::GOOGLE => "google",
            Reviews::YELP => "yelp"
        ];
    }

    /* This function is way better than the dumpJson bullshit that was basically calling
     * fucking die(). retarded.
     */
    protected function respond($object,$status='ok'){
        return response()->json(['status' => $status,'data' => $object]);
    }

    protected function legacyId() : int {
        return app()->make('App\Property\Site')->getEntity()->fk_legacy_property_id;
    }

    public function handlePull(Request $req,array $params){
        //TODO: if they want a specific platform required $params['platform'] => Reviews::FACEBOOK | Reviews::YELP | Reviews::GOOGLE
        if($this->exists($params,['all'])){
            //TODO: rate limit the shit out of this

        }else if($this->exists($params,['platforms'])){
            if(!is_array($params['platforms'])){
                $params['platforms'] = [1 => $params['platforms']];
            }
            $reviews = new Reviews;
            $ctr = 0;
            try{
                foreach($params['platforms'] as $i => $platform){
                    if(Util::arrayGet($this->platforms(),$platform)){
                        $reviews->fetchDetails(app()->make('App\Property\Site'),$store = true,$clearFirst = true,$fetchOnly = [$platform]);
                        ++$ctr;
                    }
                }
            }catch(\Exception $e){
                return $this->respond($e->getMessage() . ": " . $e->getFile() . ": " . $e->getLine(),'error');
            }
            return $this->handleGet($req,[],$justGimmeDeResultsBoss=true);
        }
    }

    public function handleGet(Request $req,array $params,$justGimmeDeResultsBoss=false){
        //TODO: if they want a specific platform required $params['platform'] => Reviews::FACEBOOK | Reviews::YELP | Reviews::GOOGLE
        if($justGimmeDeResultsBoss){
            return $this->justGiveMeTheReviews();
        }
        if($this->exists($params,['list'])){
            return $this->respond($this->platforms()); 
        }
        return $this->justGiveMeTheReviews();
    }

    private function justGiveMeTheReviews(){
        /* If they didn't specify any params just dump the json for all reviews */
        try {
            return $this->respond(Reviews::where('fk_legacy_property_id',$this->legacyId())->get());
        }catch(\Exception $e){
            Util::monoLog("Exception caught in Reviews->handleGet(): {$e->getMessage()}","error");
            return $this->respond(['unavailable','exception' => $e->getMessage()],'error');
        }
    }

    //Declared by trait: protected $_site;
    public function __construct(Site $site)
    {
        $this->_site = $site;   //Declared by trait
        if (ENV("SHOW_DEBUG_BAR") == "0") {
            \Debugbar::disable();
        }
    }

    public function resolveTemplatePath($templateDir,$page,$inData){
        Util::monoLog("Calling resolveTemplatePath is not supported on this object","error");
        return null;
    }

    public function post($page){
    }
}
