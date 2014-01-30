<?php

namespace Kohabi\USPS;

use Guzzle\Http\ClientInterface;

class API
{
    private $client;
    private $userid;
    private $testing;

    public function __construct(ClientInterface $client, $userid, $testing)
    {
        $this->client = $client;
        $this->userid = $userid;
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
        $requestMapper = new RequestMapper\StandardizeAddress();
        $responseMapper = new ResponseMapper\StandardizeAddress();
        $xml = $requestMapper->map($this->userid, $address);
        $body = $this->request('Verify', $xml);
        return $responseMapper->map($body);
    }
}
