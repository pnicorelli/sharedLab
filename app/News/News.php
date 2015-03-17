<?php
namespace module\News;

class News extends  \wwcms\Core\Module{

  public function testAction(){

    $this->response->add( 'content', 'Questo &egrave; un modulo' );
  }

  public function altrotestAction(){
    $this->response->add( 'content', 'Questo &egrave; un\'altra azione del modulo' );
    return ;
  }

}
