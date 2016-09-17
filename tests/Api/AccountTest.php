<?php

namespace Imgur\tests\Api;

use Guzzle\Http\Message\Response;
use Imgur\Api\Account;
use Imgur\Client;

class AccountTest extends \PHPUnit_Framework_TestCase
{
    private function getClientMock()
    {
        $httpMethods = array_merge(
            array('get', 'post', 'delete', 'request', 'performRequest', 'createRequest', 'parseResponse'),
            $methods
        );

        $authMethods = array_merge(
            array('getAuthenticationUrl', 'getAccessToken', 'requestAccessToken', 'setAccessToken', 'sign', 'refreshToken'),
            $methods
        );

        return new Client(
            $this->createMock('Imgur\Auth\AuthInterface', $authMethods),
            $this->createMock('Imgur\HttpClient\HttpClientInterface', $httpMethods)
        );
    }

    private function getHttpClientMock(array $methods = array())
    {
        $methods = array_merge(
            array('get', 'post', 'delete', 'request', 'performRequest', 'createRequest', 'parseResponse'),
            $methods
        );

        return $this->createMock('Imgur\HttpClient\HttpClientInterface', $methods);
    }

    private function getAuthenticationClientMock(array $methods = array())
    {
        $methods = array_merge(
            array('getAuthenticationUrl', 'getAccessToken', 'requestAccessToken', 'setAccessToken', 'sign', 'refreshToken'),
            $methods
        );

        return $this->createMock('Imgur\Auth\AuthInterface', $methods);
    }

    public function dataForBase()
    {
        return array(
            array(array('data' => array(), 'success' => false), false),
            array(array('data' => array(), 'success' => true), false),
            array(array('data' => array('id' => 1, 'url' => 'http', 'bio' => 'bio', 'reputation' => 1, 'created' => time(), 'pro_expiration' => false), 'success' => true), true),
        );
    }

    /**
     * @dataProvider dataForBase
     */
    public function testBase($responseData, $isOk)
    {
        $httpClient = $this->getHttpClientMock();
        $client = new Client($this->getAuthenticationClientMock(), $httpClient);
        $account = new Account($client);

        $expectedResponse = new Response('value');

        $httpClient->expects($this->once())
            ->method('get')
            ->with('account/me')
            ->will($this->returnValue($expectedResponse));

        $httpClient->expects($this->once())
            ->method('parseResponse')
            ->with($expectedResponse)
            ->will($this->returnValue($responseData));

        $res = $account->base();

        if (true === $isOk) {
            $this->assertInstanceOf('Imgur\Api\Model\Account', $res);
            $this->assertGreaterThan(0, $res->getId());
            $this->assertNotEmpty($res->getUrl());
            $this->assertNotEmpty($res->getBio());
            $this->assertNotEmpty($res->getReputation());
            $this->assertNotEmpty($res->getCreated());
            $this->assertFalse($res->getProExpiration());
        } else {
            $this->assertFalse($res);
        }
    }

    public function dataForCreate()
    {
        return array(
            array(array('data' => array(), 'success' => false), false),
            array(array('data' => array(), 'success' => true), false),
            array(array('data' => array('id' => 1, 'url' => 'http', 'bio' => 'bio', 'reputation' => 1, 'created' => time(), 'pro_expiration' => false), 'success' => true), true),
        );
    }

    /**
     * @dataProvider dataForCreate
     */
    public function testCreate($responseData, $isOk)
    {
        $httpClient = $this->getHttpClientMock();
        $client = new Client($this->getAuthenticationClientMock(), $httpClient);
        $account = new Account($client);

        $expectedResponse = new Response('value');

        $httpClient->expects($this->once())
            ->method('post')
            ->with('account/toto', array('key' => '6LeZbt4SAAAAAG2ccJykgGk_oAqjFgQ1y6daNz-H.'))
            ->will($this->returnValue($expectedResponse));

        $httpClient->expects($this->once())
            ->method('parseResponse')
            ->with($expectedResponse)
            ->will($this->returnValue($responseData));

        $res = $account->create('toto', array('key' => '6LeZbt4SAAAAAG2ccJykgGk_oAqjFgQ1y6daNz-H.'));

        if (true === $isOk) {
            $this->assertInstanceOf('Imgur\Api\Model\Account', $res);
            $this->assertGreaterThan(0, $res->getId());
            $this->assertNotEmpty($res->getUrl());
            $this->assertNotEmpty($res->getBio());
            $this->assertNotEmpty($res->getReputation());
            $this->assertNotEmpty($res->getCreated());
            $this->assertFalse($res->getProExpiration());
        } else {
            $this->assertFalse($res);
        }
    }

    public function dataForDelete()
    {
        return array(
            array(array('data' => array(), 'success' => false, 'status' => 200), false),
            array(array('data' => array(), 'success' => true, 'status' => 200), false),
            array(array('data' => array('id' => 1, 'url' => 'http', 'bio' => 'bio', 'reputation' => 1, 'created' => time(), 'pro_expiration' => false), 'success' => true, 'status' => 200), true),
        );
    }

    /**
     * @dataProvider dataForDelete
     */
    public function testDelete($responseData, $isOk)
    {
        $httpClient = $this->getHttpClientMock();
        $client = new Client($this->getAuthenticationClientMock(), $httpClient);
        $account = new Account($client);

        $expectedResponse = new Response('value');

        $httpClient->expects($this->once())
            ->method('delete')
            ->with('account/toto')
            ->will($this->returnValue($expectedResponse));

        $httpClient->expects($this->once())
            ->method('parseResponse')
            ->with($expectedResponse)
            ->will($this->returnValue($responseData));

        $res = $account->deleteAccount('toto');

        if (true === $isOk) {
            $this->assertInstanceOf('Imgur\Api\Model\Basic', $res);
            $this->assertNotEmpty($res->getData());
            $this->assertNotEmpty($res->getSuccess());
            $this->assertNotEmpty($res->getStatus());
        } else {
            $this->assertFalse($res);
        }
    }
}
