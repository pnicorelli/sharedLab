<?php
namespace wwcms;

class App{


  public function run(){
    $this->boot();

    try{
      // map the route
      $route = new Core\Route;
      $route->mapFromRequest();
      // imposta variabili controller e action dell'oggetto route:  a questo punto quando richiamerò le funzioni getController e getAction avrò dei dati settati

      // create an empty Response
      $response = new Core\Response();

      // Build the Module and fill response
      $mf = new Core\ModuleFactory;
      $mf->build( $route, $response );

      // get the response  // -->add()  aggiunge della roba
      $response->flush();

    } catch ( \Exception $e){
      echo "<h1>APP Exception</h1>";
      echo "<pre>";
      echo $e->__toString();
      echo "</pre>";
    }
  }

  public function boot(){
    // load authorization system (session is loaded here)
    Core\Authorize::init();

  }

}
