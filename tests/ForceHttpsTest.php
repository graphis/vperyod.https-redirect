<?php
// @codingStandardsIgnoreFile

namespace Vperyod\HttpsRedirect;

use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Uri;

class ForceHttpsTest extends \PHPUnit_Framework_TestCase
{

    protected $handler;

    public $request;

    public $response;

    public function setUp()
    {
        parent::setUp();

        $this->handler = new ForceHttps();

        $this->response = new Response;
        $this->request = ServerRequestFactory::fromGlobals();
    }

    public function testIsHttps()
    {
        $request = $this->request->withUri(
            new Uri('https://domain.com')
        );

        $next = function () {
            return 'SUCCESS';
        };

        $handler = $this->handler;
        $result = $handler($request, $this->response, $next);

        $this->assertEquals('SUCCESS', $result);
    }

    public function testNotHttps()
    {
        $request = $this->request->withUri(
            new Uri('http://domain.com')
        );

        $next = function () {
            throw new \Exception('Should not make it here');
        };

        $handler = $this->handler;
        $result = $handler($request, $this->response, $next);

        $this->assertEquals(301, $result->getStatusCode());
        $this->assertEquals('https://domain.com', $result->getHeaderLine('Location'));
    }
}

