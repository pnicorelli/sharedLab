<?php
namespace wwcms\Core;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\Request;

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
      $result[] = $this->parseMenu($file);
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
      $result[] = $this->parseMenu($file);
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


  private function parseMenu($file){
    $request = Request::createFromGlobals();
    $path = $request->getPathInfo();

    $helper = new ModuleFilesystem();
    $baseurl = $helper->getBaseUrl();

    $tmp["module"] = basename( dirname( $file[0] ) );
    $tmp["menu"] = Yaml::parse(file_get_contents( $file[0] ));

    foreach( $tmp["menu"]["actions"] as $index => $link ){
      $rootnamespace = ( basename( dirname(dirname($file[0])) ) == "Components" ) ? "Components" : "module";
      $basehref = "/".$rootnamespace."/".basename( dirname($file[0]) )."/".$tmp["menu"]["actions"][$index]["href"];
      $tmp["menu"]["actions"][$index]["href"] = $baseurl.$basehref;
      if( $basehref == $path){
        $tmp["menu"]["actions"][$index]["class"] .= " navigation-current";
      }
    }
    return $tmp;
  }
}
