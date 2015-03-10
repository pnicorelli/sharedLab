<?php
namespace wwcms\Core;

use Symfony\Component\HttpFoundation\Request;

class Route{
  private $controller;
  private $action;

  public function getController(){
    return $this->controller;
  }

  public function getAction(){
    return $this->action;
  }

  /**
   * Map the request to component / controller / action
   */
  public function mapFromRequest(){
    $request = Request::createFromGlobals();
    $array = explode("/", $request->getPathInfo());
    $array = array_filter($array , 'strlen' );

    $component = array_shift($array);
    $controller = array_shift($array);
    $action = array_shift($array);
    $component = !is_null( $component ) ? $component : "Components";

    $controller = !is_null( $controller ) ? $controller : "Index";
    $this->controller = $controllerClass = "\\".$component."\\".$controller."\\".$controller;
    $this->action = !is_null( $action ) ? $action."Action": "indexAction";
    return;
  }

}
