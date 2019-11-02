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
    public function getList()
    {
        $dom = $this->autoLogin();
        echo $dom;die; 
        $dom = $this->getDom("https://www.facebook.com/");
        // Create DOM from string
        $find = $dom->find('._5iyy',0)->children(1)->src;
        echo $find;die;
        dd($find);
    }
    public function getDom($url)
    {
        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_POST, false );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt($ch, CURLOPT_USERAGENT, "chrome");
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $data = curl_exec( $ch );
        curl_close($ch);
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
            'email'=> 'ti.284',
            'pass'=> "baodenho'",
            'login'=> 'Đăng nhập'
        );
        
        // URL 
        $url = 'https://mbasic.facebook.com/login/device-based/regular/login/?refsrc=https%3A%2F%2Fmbasic.facebook.com%2F&lwv=100&refid=8';
        
        // Khởi tạo CURL
        $ch = curl_init($url);
        
        // Thiết lập có return
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_POST, count($param));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        
        // Thiết lập sử dụng trình duyệt hiện tại
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt($ch, CURLOPT_USERAGENT, "chrome");
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $result = curl_exec($ch);
        
        curl_close($ch);
        
        return $result;
    }
}
