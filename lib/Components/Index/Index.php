<?php
namespace Components\Index;

class Index extends \wwcms\Core\Module{

  public function indexAction(){
    if( $this->isAuthenticated() ){
      $this->response->setView('login.html');
      $this->response->add( 'action', '/Components/Index/loginSubmit' );
      return;
    }

    $this->response->setView('index.html');
    $this->response->add( 'content', $this->getName() );

    return ;
  }

  public function loginSubmitAction(){
    //$this->response->setType("raw");

    $username =  $this->getPost("username");
    $password =  $this->getPost("password");
    $values = "You enter <b>$username</b> as username and <b>$password</b> as password";
    $this->response->setView('index.html');
    $this->response->add( 'content', $values );
    return ;
  }

}
