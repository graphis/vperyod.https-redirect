<?php
/**
 * Vperyod HTTPS Redirector
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  Middleware
 * @package   Vperyod\HttpsRedirect
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://github.com/vperyod/vperyod.https-redirect
 */


namespace Vperyod\HttpsRedirect;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * HttpsRedirect
 *
 * @category Middleware
 * @package  Vperyod\HttpsRedirect
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/vperyod/vperyod.https-redirect
 */
class ForceHttps
{

    /**
     * Redirect to HTTPS schema if necessary
     *
     * @param Request  $request  PSR7 Request
     * @param Response $response PSR7 Response
     * @param callable $next     next middleware
     *
     * @return Response
     *
     * @access public
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {

        if (! $this->isHttps($request)) {
            return $this->redirect($request, $response);
        }

        return $next($request, $response);
    }

    /**
     * Is request Https?
     *
     * @param Request $request PSR7 Request
     *
     * @return bool
     *
     * @access protected
     */
    protected function isHttps(Request $request)
    {
        $uri = $request->getUri();
        return strtolower($uri->getScheme()) == 'https';
    }

    /**
     * Redirect to HTTPS
     *
     * @param Request  $request  PSR7 Request
     * @param Response $response PSR7 Response
     *
     * @return Response
     *
     * @access protected
     */
    protected function redirect(Request $request, Response $response)
    {
        $uri = $request->getUri()
            ->withScheme('https')
            ->withPort(443);

        return $response
            ->withStatus(301)
            ->withHeader('Location', (string) $uri);

    }
}
