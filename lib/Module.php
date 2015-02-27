<?php
namespace wwcms;

class Module{

  private function getModulePath(){
    $rc = new \ReflectionClass(get_class($this));
    return dirname($rc->getFileName())."/";
  }

  public function getMenu($filename = "menu.php"){
    $menuFile = $this->getModulePath()."/".$filename;
    return include($menuFile);
  }

  protected function render($view, $data){
    $loader = new \Twig_Loader_Filesystem( $this->getModulePath() );
    //$twig = new \Twig_Environment($loader, array('cache' => dirname(__DIR__)."/temp"));
    $twig = new \Twig_Environment($loader, array('cache' => false));
    $template = $twig->loadTemplate($view);
    return $template->render( $data );
  }

  protected function fetchOne(){
    return ["title" => "news delle news"];
  }

  protected function fetchAll(){
    return [
      ["title" => "news delle news 1"],
      ["title" => "news delle news 2"],
      ["title" => "news delle news 3"]

    ];
  }


}
