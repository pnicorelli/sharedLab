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
    	// funzione che può lanciare delle eccezioni
      $objectController = $this->loadObject($route);
      
      echo "<br>objectController: ";
      var_export($objectController);
	  echo "<br /><br />";

	  echo "ROUTE: "; var_export($route); echo "<br>";
	  echo "RESPONSE: "; var_export($response); echo "<br>";


      $objectController->setResponse( $response );

      $action = $route->getAction();
      
      echo "ACTION: ".$action;
      
      // SI FA PARTIRE L'AZIONE CHE DOVREBBE STAMPARE LA PAGINA
      $objectController->$action();   // indexAction() La donzelletta vien dalla campagna
      
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
   
   // Route è un oggetto del nostro sistema. Route è come int, string. E' un vincolo sul tipo di dato
  public function loadObject(Route $route){
    $classController = $route->getController(); // Restituisce il controller (il secondo pezzo dell'url); il controller è un namespace
    
    echo "<br>CLASS CONTROLLER :".$classController."<br>";
    
    if( !class_exists($classController) ){
      throw new \Exception("Class <".$route->getController().">not found");
    }
    $objectController = new $classController(); // SE index --> new \Components\Index\Index
    $action = $route->getAction();
    
    echo "<br>ACTION (dentro a loadObject): ".$action."<br /> ";
    
    if( !method_exists($objectController, $action) ){
      throw new \Exception( "Method <". $route->getController() ."::".$route->getAction()."> not implemented" );
    }
    return $objectController;
  }

}
