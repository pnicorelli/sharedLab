<?php
namespace wwcms\Core;

class Response{
  private $container;

  public function add( $input ){
    $this->container[] = $input;
  }

  public function flush(){
    var_dump($this->container);
  }
}
