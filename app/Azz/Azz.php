<?php
namespace module\Azz;

class Azz extends \wwcms\Module{

  public function yoooAction(){
    return "yooooo";
  }

  public function lalistaAction(){
    $data = $this->fetchAll();
    return $this->render('list.html', [ "data" => $data]);
  }

  public function ilsingoloAction(){
    $data = $this->fetchOne();
    return $this->render('item.html', [ "data" => $data]);
  }


}
