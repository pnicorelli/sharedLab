<?php
namespace module\News;

class News extends  \wwcms\Core\Module{

  public function yoooAction(){
    return "yooooo";
  }

  public function lalistaAction(){

    $this->response->add( 'content', 'Yoooop' );
    return ;
  }

  public function ilsingoloAction(){
    $data = $this->model->fetchOne();
    return $this->render('item.html', [ "data" => $data]);
  }


}
