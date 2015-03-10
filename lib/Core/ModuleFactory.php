<?php
namespace wwcms\Core;

class ModuleFactory{
  private $controller;
  private $action;

  public function __construct(){

  }

  /**
   * Load the controller, launch the method and add the output on the Response
   * @param  Route    $route    [The parsed route]
   * @param  Response $response [Reference to the response]
   */
  public function build(Route $route, Response &$response){
    try{
      $objectController = $this->loadObject($route);
      $action = $route->getAction();
      $response->add( $objectController->$action(), $objectController->responseType() );
    } catch ( \Exception $e ){
      $response->add( $e, 'array' );
    }
    return;
  }

  /**
   * Check if class & method exists
   * @param Route $route [The parsed route]
   */
  public function loadObject(Route $route){
    $classController = $route->getController();
    if( !class_exists($classController) ){
      throw new \Exception("Class <".$route->getController().">not found");
    }
    $objectController = new $classController();
    $action = $route->getAction();
    if( !method_exists($objectController, $action) ){
      throw new \Exception( "Method <". $route->getController() ."::".$route->getAction()."> not implemented" );
    }
    return $objectController;
  }

}
