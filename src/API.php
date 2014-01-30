<?php

namespace Kohabi\USPS;

use Guzzle\Http\ClientInterface;

class API
{
    private $client;
    private $user;
    private $testing;

    public function __construct(ClientInterface $client, $user, $testing)
    {
        $this->client = $client;
        $this->user = $user;
        $this->testing = $testing;
    }

    private function getURL()
    {
        $dll = $this->testing ? 'ShippingAPITest.dll' : 'ShippingAPI.dll';
        return 'https://secure.shippingapis.com/' . $dll;
    }

    private function request($api, $xml)
    {
        $request = $this->client->get($this->getURL());
        $request->getQuery()->set('API', $api);
        $request->getQuery()->set('XML', $xml);
        $response = $request->send();
        $responseParser = new ResponseParser();
        if ($response->isSuccessful()) {
            $body = $response->getBody(true);
            return $responseParser->parse($body);
        }
        throw new APIException('Request failed');
    }

    public function standardizeAddress(Address $address)
    {
        $requestMapper = new Mapper\Request\StandardizeAddress();
        $responseMapper = new Mapper\Response\StandardizeAddress();
        $xml = $requestMapper->map($this->user, $address);
        $body = $this->request('Verify', $xml);
        return $responseMapper->map($body);
    }
}
