<?php
namespace wwcms\Core;

class Response{
  private $container;

  /**
   * Add data to response
   * @param [type] $data the stuff to be added
   * @param [type] $type the type of data like html, text, array....
   */
  public function add( $data, $type=null ){
    $this->container[] = array( $type, $data);
    return;
  }

  /**
   * flush all the output generated
   */
  public function flush(){
    echo "<pre>";
    print_r($this->container);
    echo "</pre>";
    return;
  }
}
