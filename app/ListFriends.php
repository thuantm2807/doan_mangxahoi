<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sunra\PhpSimple\HtmlDomParser;

class ListFriends extends Model
{
    protected $table = "danh_sach_ban_chung";

    protected $fillable = [
        'id',
        'ban',
        'ban_chung'
    ];

    protected $guarded = [];

    public $timestamps=false;


    private $resultCrawlLogin;

    function __construct(){
        // echo "df"; die;
    }

    public function getList()
    {
        echo $this->autoLogin();
        die;
        // echo $dom;die; 
        // $dom = $this->getDom("https://www.facebook.com/");
        // // Create DOM from string
        // $find = $dom->find('._5iyy',0)->children(1)->src;
        // echo $find;die;
        // dd($find);
        $dom = $this->getDom($dom);
    }
    public function getDom($data)
    {
        $dom = HtmlDomParser::str_get_html($data);

        return $dom;
    }
    public function autoLogin()
    {
        // Các tham số
        $param = array(
            'lsd' => 'AVrXZvgM',
            'jazoest'=> '2741',
            'm_ts'=> '1572082784',
            'li'=> 'YBS0XauqMwdTfVaVx7T26JLY',
            'try_number'=> '0',
            'unrecognized_tries'=> '0',
            'email'=> '16520391@gm.uit.edu.vn',
            'pass'=> "baodenho0",
            'login'=> 'Đăng nhập'
        );
        
        
        $dom = $this->getCrawlUrl("https://mbasic.facebook.com/login/device-based/regular/login/", "GET");

        $dom = $this->getDom($dom);

        // $find = $dom->find('._5iyy',0)->children(1)->src;

    }

    private function getCrawlUrl($url,$method, $params = null){
        //login fb
        // $url = 'https://mbasic.facebook.com/login/device-based/regular/login/';
        
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $post = null;

        if($method == "POST"){
            $post = count($params);
        } else {
            $post = false;
        }
        
        curl_setopt($ch, CURLOPT_POST, $method);

        if($method == "POST"){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        
        // Thiết lập sử dụng trình duyệt hiện tại
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_USERAGENT, "chrome");
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $result = curl_exec($ch);
        
        curl_close($ch);
        
        return $result;
    }

    private function getParamsLogin(){

        $arr =[];

        return $arr;
    }
}
