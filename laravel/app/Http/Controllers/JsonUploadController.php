<?php
namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Property\Site;
use App\Http\Controllers\SiteController;
use App\Traits\PageResolver;
use App\Util\Util;
use App\Assets\SoapClient;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Traits\NoNo;
use App\Property\Text\Type as TextType;
use App\Property\Text as PropertyText;
use App\Property\Template as PropertyTemplate;
use Redis;
use App\System\Session;
use App\Mailer\MultiContact;
use App\Property\Gallery\Details as GalleryDetails;
use App\Property\Photo as PropertyPhoto;

class JsonUploadController extends PostController
{
    use PageResolver;
    use ValidatesRequests;
    use Nono;

    //Declared by trait: protected $_site
    //TODO: Create a loading mechanism so we can dynamically load and unload allowed handlers
    protected $_allowed = [
        /**********************************************************/
        /* Routes that process non-authenticated form submissions */
        /**********************************************************/
        'json' => 'handleJson'
    ];

    protected $_modes = [
      'save|gallery' => [
        'func' => 'handleSaveGallery',
        'admin' => true
      ],
      'fetch|gallery' => [
        'func' => 'handleFetchGallery',
        'admin' => true
      ],

    ];

    protected $_fetchTypes = [
        'details' => 'handleFetchGalleryDetails'
    ];
    protected $_translations = [];
    //

    public function __construct(){
        if(env("SHOW_DEBUG_BAR") == "0"){
            \Debugbar::disable();
        }
    }

    public function authenticateAdmin(){
      return Session::isCmsUser();
    }

    public function handleJson(Request $req){
      foreach($this->_modes as $key => $func){
        list($mode,$section) = explode("|",$key);
        if($req->input('mode') == $mode && $req->input('section') == $section)
            if(isset($func['admin']) && $func['admin'])
              if(!$this->authenticateAdmin())
                return response()->json(['status' => 'error','you are not logged in']);
              else
                return $this->{$func['func']}($req);
            else
              return $this->{$func['func']}($req);
      }
      return response()->json(['status' => 'controllerError','message'=>'invalid url']);
    }

    public function handleFetchGallery(Request $req){
        $dat = $req->input();
        if(in_array($dat['type'],array_keys($this->_fetchTypes))){
            return $this->{$this->_fetchTypes[$dat['type']]}($req);
        }
        return response()->json(['status' => 'error','message' => 'unhandled request type']);
    }


    public function handleSaveGallery(Request $req){
      $dat = $req->input();
      $ret = ['status' => 'ok'];
      $foo = new GalleryDetails( );
      if($foo->updateOrInsert($dat,'image_name'))
        $ret = [
          'status' => 'ok',
          'message' => 'items saved :)'
        ];
      else $ret = [
          'status' => 'error',
          'message' => 'unable to save at this time :/'
        ];
      return response()->json($ret);
    }

    protected function _fetchElementCategories(){
        $prop = PropertyPhoto::where('property_id',app()->make('App\Property\Site')
            ->getEntity()
            ->fk_legacy_property_id)
        ->join('photo_type','photo_type.id','=','property_photo.photo_type_id')
        ->get();
        if(!count($prop)){
            return [];
        }
        return $prop->toArray();
    }

    public function handleFetchGalleryDetails(Request $req){
        //TODO: return category types from a table !mysql !database 
        return response()->json([
            'categoryList' => [
                    ['val' => 'main','label' => 'Apartment'],       //TODO: Decorate the label based on the template used
                    ['val' => 'community','label' => 'Community'],  //TODO ^^
            ],
            'elements' => $this->_fetchElementCategories()
         ]);
    }
}
