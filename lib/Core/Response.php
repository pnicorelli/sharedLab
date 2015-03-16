<?php
namespace wwcms\Core;

class Response{
  private $container;

  public function add( $input ){
    $this->container[] = $input;
  }

  public function flush(){
    echo "<pre>";
    var_dump($this->container);
    echo "</pre>";    
  }
}
