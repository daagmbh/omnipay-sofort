<?php

namespace Omnipay\Sofort\Message;

use Omnipay\Common\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{
    private $statusCode;

    /**
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     */
    public function __construct(RequestInterface $request, $response)
    {
        parent::__construct($request, $response);

        $this->data = simplexml_load_string($response->getBody()->getContents());
        $this->statusCode = $response->getStatusCode();
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
    }

    public function getRedirectUrl()
    {
    }

    public function getCode()
    {
        return $this->statusCode;
    }
}
