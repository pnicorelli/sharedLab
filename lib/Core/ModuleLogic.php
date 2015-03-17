<?php
namespace wwcms\Core;
use Symfony\Component\HttpFoundation\Request;

class ModuleLogic extends ModuleFilesystem{
  public $response;
  public $authorize;

  public function getPost( $name ){
    $request = Request::createFromGlobals();
    return $request->request->get($name);
  }

  public function setResponse(Response &$response){
    $this->response = $response;
    return;
  }

  public function hasPermission( $name ){
    return Authorize::hasPermission($name);
  }

  public function isAuthenticated( ){
    return Authorize::isAuthenticated( );
  }

  public function logout( ){
    return Authorize::logout( );
  }


}
