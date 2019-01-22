<?php

namespace Union\HTML;

class Loader
{

    public $html;

    public function __construct(){
        $this->html = '';
    }


    public function pull($html){
        $this->html .= $html;
    }

    public function pull_replace($html){
        $this->html = $html;
    }

    public function load($path, $data = array(), $pull = true){
        extract($data);
        ob_start();
        require NU_STAT_PATH . $path;
        $response = ob_get_contents();
        ob_end_clean();
        if($pull) $this->pull($response);
        return $response;
    }

    public function loadArray($files){
        $output = '';
        foreach($files as $file){
            $output .= $this->load($file, array());
        }
        return $output;
    }

    public function insert_html($path){
        $wrapper = $this->load($path, array(), false);

        $this->pull_replace(vsprintf($wrapper, $this->html));
    }



}