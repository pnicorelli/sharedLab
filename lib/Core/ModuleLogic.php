<?php
namespace wwcms\Core;

class ModuleLogic extends ModuleFilesystem{
  public $response;

  public function setResponse(Response &$response){
    $this->response = $response;
    return;
  }

}
