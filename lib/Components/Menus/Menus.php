<?php
namespace Components\Menus;

class Menus extends \wwcms\Core\Module{


  public function testAction(){
    $this->response->add( 'content', 'Qui siamo nei componenti!' );
    return;
  }

}
