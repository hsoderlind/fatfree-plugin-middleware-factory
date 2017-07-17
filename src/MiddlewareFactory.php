<?php

namespace Hsoderlind\FatfreePlugins\MiddlewareFactory;

use \Hsoderlind¶FatfreePlugins\Http\Request;
use \Hsoderlind¶FatfreePlugins\Http\Response;

class MiddlewareFactory
{
    /**
     * Create a stack of middlewares
     * @param array $stack
     */
    public static function stack($f3, $middlewares)
    {
        $stack = [];
        $request = new Request($f3):
        $response = new Response($f3);
        $numMiddlewares = count($middlewares);
        $index = 0;

        foreach ($middlewares as $callback) {
            $middleware = new Middleware($request, $response, $callback);
            $result = $middleware->run();

            if ($result === 'next') {
                $index++;

                if ($index === $numMiddlewares) {
                    return $response->send();
                    break;
                }
            } else {
                return $response->send();
                break;
            }
        }
    }


}
