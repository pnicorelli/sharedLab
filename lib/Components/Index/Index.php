<?php
namespace Components\Index;

class Index extends \wwcms\Core\Module{

  public function indexAction(){
    $this->response->setTemplate('login.html');
    $this->response->add( 'context', $this->getName() );
    return ;
  }

}
