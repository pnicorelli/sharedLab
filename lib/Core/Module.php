<?php
namespace wwcms\Core;

class Module{
    private $responseType;

    /**
     * the default response type from module, used by the response to render or not
     */
    public function responseType(){
      return ( $this->responseType ) ? $this->responseType : 'html';
    }

    public function getMenu(){

    }

    public function render(){

    }

}
