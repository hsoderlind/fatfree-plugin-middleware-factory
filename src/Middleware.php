<?php

namespace Hsoderlind\FatfreePlugins\MiddlewareFactory;

class Middleware
{
    /**
     * @var \Hsoderlind¶FatfreePlugins\Http\Request
     */
    public $request;

    /**
     * @var \Hsoderlind¶FatfreePlugins\Http\Response
     */
    public $response;

    /**
     * @var mixed callable
     */
    private $callback;

    public function __construct($request, $response, $callback)
    {
        $this->request = $request;
        $this->response = $response;
        $this->callback = $callback;
    }

    public function next()
    {
        return 'next';
    }

    public function error($errorNum, $errorMessage)
    {
        $this->response->setStatusCode($errprNum);
        $this->response->body = $errorMessage;
    }

    public function run()
    {
        if (!is_callable($this->callback)) {
            return $this->error(500, get_called_class() . '::$callback is not a function.');
        }

        return call_user_func($this->callback, $this);
    }
}
