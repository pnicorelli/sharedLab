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

      $objectController->setResponse( $response );

      $action = $route->getAction();
      $objectController->$action();
    } catch ( \Exception $e ){

      $response->setView( 'error.html' );
      $response->add( "error", $e->getMessage() );
      $response->add( "exception", $e );
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
