<?php
namespace wwcms;

class App{


  public function run(){
    try{
      // map the route
      $route = new Core\Route;
      $route->mapFromRequest();

      // create an empty Response
      $response = new Core\Response;

      // Build the Module and fill response
      $mf = new Core\ModuleFactory;
      $mf->build( $route, $response );

      // get the response  // -->add()  aggiunge della roba
      $response->flush();

    } catch ( \Exception $e){
      echo "<pre>";
      echo $e->__toString();
      echo "</pre>";
    }
  }


}
