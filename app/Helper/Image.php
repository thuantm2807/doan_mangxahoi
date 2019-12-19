<?php
namespace App\Helper;
use Auth;

class Image{
	public function uploadImage($checkImage, $requestImage){
		$userId = Auth::user()->id;

        $img = $requestImage;
        $imgName = time().".".$img->getClientOriginalName();
        // if(!empty($nameImageDB)){
        // 	if(file_exists('upload/images/'.$nameImageDB)){
        //    	 	unlink('upload/images/'.$nameImageDB);
        // 	}
        // }   
        $path = 'upload/images/'.$userId; 
        $img->move($path, $imgName);

        return "/".$imgName;
        
	}
    /**
     * Auto upload image to SummerNote 
     * @param  $detail is SummerNote content
     * @return $detail 
     */
    public function uploadImageSummerNote($detail){
    	$userId = Auth::user()->id;

        $dom = new \DomDocument();
        $dom->loadHtml('<?xml encoding="utf-8" ?>' .$detail);   
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            if($data){
                try {
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
                    $image_name= "/upload/images/".$userId."/". time().$k.'.png';

                    $checkFile = "upload/images/".$userId;

                    if(!file_exists($checkFile)){
                    	mkdir($checkFile, 0777, true);
                    }
                  

                    $path = public_path() . $image_name;
                    file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);

                } catch (\Exception $e) {
                	\Log::info($e);
                    continue;
                }
                
            }            
        }
        // echo ($detail); die;
        $detail = $dom->saveHTML();
        return $detail;
    }
}
