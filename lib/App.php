<?php
namespace wwcms;

class App{


  public function run(){
    try{
      // map the route
      $router = new core\Route;
      $router->mapFromRequest();

      // load the resources
      $mf = new core\ModuleFactory;
      $mf->setController( $router->getController() );
      $mf->setAction( $router->getAction() );

      // get the response
      $response = $mf->make( );

      // render it
      $render = new Render();
      $render->render( $response );

    } catch ( \Exception $e){
      echo "<pre>";
      echo $e->__toString();
      echo "</pre>";
    }
  }


}
