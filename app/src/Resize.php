<?php

use \Eventviva\ImageResize;

define("ORIGINALS_DIR", "/home/codio/workspace/public/images/original/");
define("RESIZED_DIR", "/home/codio/workspace/public/images/small/");

class Resize 
{
    public function fire($job, $data)
    {
        $image = new ImageResize($data['source_image_url']);
        $filename = $data['user_id'] . image_type_to_extension($image->source_type, true);
        
        if($data['save_original'])
        {
        	$image->save(ORIGINALS_DIR . $filename);    
        }
        
        if($image->getSourceWidth() > $data['resize_to_width'] || $image->getSourceHeight() > $data['resize_to_height'])
        {
            $image->resize($data['resize_to_width'], $data['resize_to_height']);
        }

        $image->save(RESIZED_DIR . $filename);
        
        $job->delete();
    }    
}