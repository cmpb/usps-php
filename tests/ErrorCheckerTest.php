<?php

namespace Kohabi\USPS;

class ErrorCheckerTest extends \PHPUnit_Framework_TestCase
{
    private $errorChecker;

    protected function setUp()
    {
        $this->errorChecker = new ErrorChecker();
    }

    public function testThrowsExceptionGivenError()
    {
        $this->setExpectedException(
            'Kohabi\USPS\APIException',
            'Error Description',
            11
        );

        $error = new \SimpleXMLElement('<Error></Error>');
        $error->addChild('Number', '11');
        $error->addChild('Description', 'Error Description');

        $this->errorChecker->check($error);
    }

    public function testDoesNothingIfNotError()
    {
        $error = new \SimpleXMLElement('<D></D>');
        $error->addChild('Number', '11');
        $error->addChild('Description', 'Error Description');
        $this->assertEquals(null, $this->errorChecker->check($error));
    }
}
