<?php
namespace wwcms;

class App{


  public function run(){
    try{
      $router = new Router();
      $router->mapFromRequest();


      $loader = new \Twig_Loader_Filesystem( dirname(__DIR__)."/templates/default/" );
      //$twig = new \Twig_Environment($loader, array('cache' => dirname(__DIR__)."/temp"));
      $twig = new \Twig_Environment($loader, array('cache' => false, 'autoescape'=>false));

      $cClass = $router->getController();
      $cObj = new $cClass();
      $cAction = $router->getAction();

      $template = $twig->loadTemplate('index.html');
      echo $template->render( array('content' => $cObj->$cAction(), 'navigation' => $cObj->getMenu() ));

    } catch ( \Exception $e){
      echo "<pre>";
      echo $e->__toString();
      echo "</pre>";
    }
  }


}
