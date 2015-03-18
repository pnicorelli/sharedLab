<?php
namespace Components\Index;

class Index extends \wwcms\Core\Module{

  public function indexAction(){
  
  	echo "<h1>public function indexAction(): echo La donzelletta vien dalla campagna</h1>";
  
    //  return [ "qqq" => "1121"];
    if( !$this->isAuthenticated() ){
      return  $this->loginAction();
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

  public function loginAction(){
    $this->response->setView('login.html');
    $this->response->add( 'action', '/Components/Index/loginSubmit' );
    return;
  }
  

  public function logoutAction(){
    $this->logout();
    $this->loginAction();
    return;
  }

}
