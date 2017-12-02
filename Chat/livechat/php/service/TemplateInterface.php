<?php

class TemplateInterface extends Service
{
    public $user;
    public $request;
    public $env;

    private $app;
    
    public function onRegister()
    {
        parent::onRegister();
        
        // -----
        
        $this->app     = $this->getApp();
        $this->user    = $this->get('user');
        $this->request = $this->get('request');
        $this->env     = $this->get('config')->data['env'];
    }
    
    public function asset($file)
    {
        $rootUrl = $this->request->getRootUrl();
        
        return $rootUrl . $file;
    }
    
    public function path($actionName)
    {
        return $this->request->getRootUri() . '?' . $this->get('router')->getRoute($actionName);
    }
    
    public function url($actionName)
    {
        return $this->request->getRootUriFull() . '?' . $this->get('router')->getRoute($actionName);
    }

    public function render($actionName)
    {
        $response = $this->app->runAction($actionName);

        echo $response->getContent() . "\n";
    }

    public function renderView($path, $vars = array())
    {
        // Create empty controller and inject services to it

        $controller = new Controller();
        $controller->setServiceContainer($this->services);
        
        // Create and display the response
        
        $response = $controller->render($path, $vars);

        echo $response->getContent() . "\n";
    }
}

?>
