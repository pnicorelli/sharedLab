<?php
namespace wwcms\Core;

class Module{

  private function getModulePath(){
    $rc = new \ReflectionClass(get_class($this));
    return dirname($rc->getFileName())."/";
  }

  public function getMenu($filename = "menu.php"){
    $menuFile = $this->getModulePath()."/".$filename;
    return include($menuFile);
  }
