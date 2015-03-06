<?php
namespace wwcms\Core;

class ModuleFactory{
  private $controller;
  private $action;

  public function __construct(){

  }

  public function setController( $controller ){
    if ( !class_exists( $controller, true) ){
      $this->controller = $controller;
    } else {
      $this->controller = null;
    }
    return;
  }

  public function setAction( $action ){
    $classController = $this->controller;
    $objectController = new $classController();
    $action = $this->action;
    if( !method_exists($objectController, $action) ){
      $this->action = $action;
    } else {
      $this->action = null;
    }
    return;

  }

  public function make( ){
    if( is_null( $this->controller ) ){
      throw new Exception( "Unable to instantiate from <".$this->controller.">");
    }
    if( is_null( $this->action ) ){
      throw new Exception( "Unable to call  <".$this->controller."::".$this->action.">");
    }
    if( !$this->allowed() ){
      throw new Exception( "Not Authorized" );
    }

    $classController = $this->controller;
    $objectController = new $classController();
    $action = $this->action;
    
    return $objectController->$action();
  }

  public function allowed(){
    return true;
  }

}
