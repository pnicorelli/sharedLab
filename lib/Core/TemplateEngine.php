<?php
namespace wwcms\Core;

class TemplateEngine{

  public function render($template_dir, $view, $data){
    $loader = new \Twig_Loader_Filesystem( dirname(dirname(__DIR__))."/templates/".$template_dir."/" );
    //$twig = new \Twig_Environment($loader, array('cache' => dirname(__DIR__)."/temp"));
    $twig = new \Twig_Environment($loader, array('cache' => false, 'autoescape'=>false));
    $template = $twig->loadTemplate($view);
    return $template->render( $data );
  }

}
