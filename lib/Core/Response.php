<?php
namespace wwcms\Core;

class Response{
  private $container;
  private $type; // html, text, json... used before flush for  decoratation
  private $template; // the directory in ./templates/ where fetch layouts
  private $layout; // the page to use when decorate

  public function __construct(){
    $this->type = 'html';
    $this->container = [];
    $this->template = 'default';
    $this->layout = 'index.html';
  }

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

  /** SETTERS / GETTERS **/

  public function setType($type){
    $this->type = $type;
  }

  public function setLayout($layout){
    $this->layout = $layout;
  }

  public function setTemplate($template){
    $this->template = $template;
  }

}
