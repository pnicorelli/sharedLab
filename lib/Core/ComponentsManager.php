<?php
namespace wwcms\Core;
use Symfony\Component\Yaml\Yaml;

class ComponentsManager{

  /**
   * retrieve all module
   */
  public function getModulesMenus(){
    $Directory = new \RecursiveDirectoryIterator( dirname(dirname(__DIR__))."/app/" );
    $Iterator = new \RecursiveIteratorIterator($Directory);
    $Regex = new \RegexIterator($Iterator, '/^.+menu\.yaml$/i', \RecursiveRegexIterator::GET_MATCH);
    $result =[];
    foreach( $Regex as $index => $file ){

      $tmp["module"] = basename( dirname( $file[0] ) );
      $tmp["menu"] = Yaml::parse(file_get_contents( $file[0] ));
      $result[] = $tmp;
    }
    return [ "module" => $result ];
  }
  /**
   * retrieve all module
   */
  public function getComponentsMenus(){
    $Directory = new \RecursiveDirectoryIterator( dirname(__DIR__)."/Components/" );
    $Iterator = new \RecursiveIteratorIterator($Directory);
    $Regex = new \RegexIterator($Iterator, '/^.+menu\.yaml$/i', \RecursiveRegexIterator::GET_MATCH);
    $result =[];
    foreach( $Regex as $index => $file ){

      $tmp["module"] = basename( dirname( $file[0] ) );
      $tmp["menu"] = Yaml::parse(file_get_contents( $file[0] ));
      $result[] = $tmp;
    }
    return [ "Components" => $result ];
  }

  /**
   * retrieve all components
   */
  public function getAllMenus(){
    $sum = array_merge($this->getComponentsMenus(), $this->getModulesMenus());
    return $sum;
  }

}
