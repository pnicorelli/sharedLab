<?php

/**
 * This Class add helper functions for retrieve infos about the Module
 *
 */
namespace wwcms\Core;

class ModuleFilesystem{

  /**
   * return the absolute path
   */
  public function getModulePath(){
    $rc = new \ReflectionClass(get_class($this));
    return dirname($rc->getFileName()).DIRECTORY_SEPARATOR;
  }

  /**
   * return the full classname with namespace
   */
  public function getName(){
    $rc = new \ReflectionClass(get_class($this));
    return $rc->getName();
  }


}
