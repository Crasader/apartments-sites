<?php

namespace App\Reviews;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property;
use App\Property\Entity;

class Facebook {

    private static $instance = NULL;
    private static $default_graph_version = 'v2.9';

    private function __construct() {
        $this->pageID = Config::get('facebook.pageID');
        $this->appId = Config::get('facebook.appId');
        $this->appSecret = Config::get('facebook.appSecret');
        $this->pageAccessToken = Config::get('facebook.pageAccessToken');
        $this->ch = curl_init();
        $this->pdo = Database::getInstance();

        $this->fb = new \Facebook\Facebook([
            'app_id' => $this->appId,
            'app_secret' => $this->appSecret,
            'default_graph_version' => self::$default_graph_version,
                //'default_access_token' => '{access-token}', // optional
        ]);
    }

    private function __clone() {
        return;
    }

    public static function getInstance($scopes = array()) {
        if (static::$instance === NULL) {
            $className = get_called_class();
            static::$instance = new $className($scopes);
        }
        return static::$instance;
    }

    public function getReviews() {
        
        try {
            $response = $this->fb->get('/' . $this->pageID . '/ratings', $this->pageAccessToken);
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        return $response->getDecodedBody();
        
    }

    public function storeResponse() {

        $res = $this->getReviews();

        foreach ($res['data'] as $key => $val) {
            
            $row = Query::getInstance()->getSelectedRows($this->pdo, 'fb_user', "`user_id` = '" . $val['reviewer']['id'] . "' AND `review_created` = '" . $this->convertDate('Y-m-d h:i:s a', strtotime($val['created_time'])) . "' ");

            if (empty($row)) {
                $colVal = "( '' , '" . $val['reviewer']['id'] . "' , '" . $val['reviewer']['name'] . "' , " 
                        . " " . $this->pdo->quote($val['review_text']) . " , '" . $val['rating'] . "' , "
                        . "'" . $this->convertDate('Y-m-d h:i:s a', strtotime($val['created_time'])) . "' , '" . $this->convertDate('Y-m-d h:i:s a', time()) . "' )";

                $id = Query::getInstance()->insertRows($this->pdo, 'fb_user', '(`id`, `user_id`, `user_name`, `user_text`, `user_rating`, `review_created`, `created_on`)', $colVal);

//                echo $id;
            }
        }
    }

    public function convertDate($format, $date) {
        return date($format, $date);
    }

    public function __destruct() {
        curl_close($this->ch);
    }

}
