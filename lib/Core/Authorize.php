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

  public static function getUser( ){
    $user = self::$session->get('user', false);
    return ( $user === false )?null:$user;
  }

  public static function isAuthenticated( ){
    $user = self::$session->get('user', false);
    return ( $user === false )?false:true;
  }

  public static function login($username, $password){
    $user = [
        "username" => $username,
        "password" => $password
    ];
    self::$session->set('user', $user);
    return true;
  }

  public static function logout(){
    return self::$session->invalidate();
  }
}
