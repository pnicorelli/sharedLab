<?php
namespace wwcms\Core;
use Symfony\Component\HttpFoundation\Session\Session;

class Authorize{
  public static $session;

  public static function init(){
    $session = new Session();
    $session->start();

    self::$session = $session;
    // set and get session attributes
    //self::$session->set('name', 'Drak');

  }

public static function hasPermission( $name ){
  $permissions = self::$session->get('permissions', []);
  return in_array($name, $permissions)?true: false;
}

public static function isAuthenticated( ){
  $user = self::$session->get('user', false);
  return isset( $user )?true:false;
}

}
