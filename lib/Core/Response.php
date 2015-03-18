<?php
namespace wwcms\Core;

class Response{
  private $container;
  private $type; // html, text, json... used before flush for  decoration
  private $template; // the directory in ./templates/ where fetch layouts
  private $view; // the page to use when decorate

  public function __construct(){
    $this->type = 'html';
    $this->container = [];
    $this->template = 'default';
    $this->view = 'index.html';
  }

  /**
   * Add data to response
   * @param [type] $data the stuff to be added
   * @param [type] $type the type of data like html, text, array....
   */
  public function add( $name, $value ){
    $this->container[$name] = $value;
    return;
  }

  /**
   * flush all the output generated
   */
  public function flush(){
    echo "<pre>";
    var_dump($this->container);
    echo "</pre>";    
    switch( $this->type ){
      case "html":
        $navigation = new Navigation();
        $this->container["navigation"] = $navigation->getMenu();

        $templateEngine = new TemplateEngine();
        echo $templateEngine->render( $this->template, $this->view, $this->container );

        break;
      default:
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }
    return;
  }

  /** SETTERS / GETTERS **/

  public function setType($type){
    $this->type = $type;
  }

  public function setView($view){
    $this->view = $view;
  }

  public function setTemplate($template){
    $this->template = $template;
  }

}
