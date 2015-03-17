<?php
namespace Components\Index;
use \wwcms\Core\Authorize;

class Index extends \wwcms\Core\Module{

  public function indexAction(){
    if( !$this->isAuthenticated() ){
      return  $this->loginAction();
    }

    $content = "Il modulo si chiama: <b>".$this->getName()."</b><br>";

    $user = Authorize::getUser();
    $content .= "Tu sei loggato come: <b>".$user["username"]."</b><br>";

    $this->response->add( 'content', $content );

    return ;
  }

  public function loginSubmitAction(){
    //$this->response->setType("raw");
    $username =  $this->getPost("username");
    $password =  $this->getPost("password");
    Authorize::login( $username, $password);
    $values = "Hai messo <b>$username</b> come username e <b>$password</b> come password";
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
