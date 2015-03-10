<?php
namespace module\News;

class News extends  \wwcms\Core\Module{

  public function yoooAction(){
    return "yooooo";
  }

  public function lalistaAction(){
    $data = $this->model->fetchAll();
    return $this->render('list.html', [ "data" => $data]);
  }

  public function ilsingoloAction(){
    $data = $this->model->fetchOne();
    return $this->render('item.html', [ "data" => $data]);
  }


}
