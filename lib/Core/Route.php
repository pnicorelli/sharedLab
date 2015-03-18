<?php
// **** namespace ***  Quella classe li esiste in quel posto. 1 Serve a evitare conflitti di nome. 2. autoload dei files
/*

The ability to refer to an external fully qualified name with an alias, or importing, is an important feature of namespaces. This is similar to the ability of unix-based filesystems to create symbolic links to a file or to a directory.

All versions of PHP that support namespaces support three kinds of aliasing or importing: aliasing a class name, aliasing an interface name, and aliasing a namespace name. PHP 5.6+ also allows aliasing or importing function and constant names.

In PHP, aliasing is accomplished with the use operator. Here is an example showing all 5 kinds of importing:

namespace foo;
use My\Full\Classname as Another;

// this is the same as use My\Full\NSname as NSname
use My\Full\NSname;

// importing a global class
use ArrayObject;

// importing a function (PHP 5.6+)
use function My\Full\functionName;

// aliasing a function (PHP 5.6+)
use function My\Full\functionName as func;

// importing a constant (PHP 5.6+)
use const My\Full\CONSTANT;

	I namespaces funzionano un po' come le directories: definiscono un ambito, permettendo di evitare conflitti tra entità con lo stesso nome,
	PHP namespaces forniscono un modo attraverso il quale raggruppare classi correlate, interfacce, funzioni e costanti.
	Es.:
	<?php
	namespace MyProject\Sub\Level;	
	
*/
namespace wwcms\Core;



// **** use *** serve ... vedi riga --> $request = Request::createFromGlobals();
/*

Serve ad importare il namespace nello spazio dei nomi corrente (nel nostro esempio quello globale), ed ad accedere alla struttura usando solamente la parte finale del nome del namespace;


/*
	


*/
use Symfony\Component\HttpFoundation\Request;


// dovessi usare la classe della mail scriverei: use phpmailer\phpmailer;

class Route{
  private $controller;
  private $action;

  public function getController(){
    return $this->controller;
  }

  public function getAction(){
    return $this->action;
  }

  /**
   * Map the request to component / controller / action
   */
  public function mapFromRequest(){
    $request = Request::createFromGlobals();
    
    //$request = Symfony\Component\HttpFoundation\Request::createFromGlobals();
    
    $array = explode("/", $request->getPathInfo());
    $array = array_filter($array , 'strlen' );

    $component = array_shift($array);  // IL PRIMO PEZZO E' IL MIO COMPONENT
    $controller = array_shift($array); // IL SECONDO PEZZO E' IL CONTROLLER
    $action = array_shift($array); // IL TERZO PEZZO E' L'AZIONE
    
    
    $component = !is_null( $component ) ? $component : "Components";

    $controller = !is_null( $controller ) ? $controller : "Index";
    $this->controller = $controllerClass = "\\".$component."\\".$controller."\\".$controller;
    $this->action = !is_null( $action ) ? $action."Action": "indexAction";
    return;
  }

}
