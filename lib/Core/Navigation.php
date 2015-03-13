<?php
namespace wwcms\Core;

class Navigation{

  public function getMenu(){
    $cm = new ComponentsManager();
    $menus = $cm->getAllMenus();
    return $menus;
  }
}
