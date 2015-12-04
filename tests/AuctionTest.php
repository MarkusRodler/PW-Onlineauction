<?php
declare(strict_types = 1);

namespace Dark\PW\Onlineauction;

/**
 * @covers \Dark\PW\Onlineauction\Auction
 */
class AuctionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCanNotBeEmpty()
    {
        new Auction('', 'Beschreibung', 1, new \DateTime('1.1.2037'), new \DateTime('1.1.2037'));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty description is not allowed
     */
    public function testDescriptionCanNotBeEmpty()
    {
        new Auction('Auktionsname', '', 1, new \DateTime('1.1.2037'), new \DateTime('1.1.2037'));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage StartPrice must be positive
     */
    public function testStartPriceMustBePositive()
    {
        new Auction('Auktionsname', 'Description', -1, new \DateTime('1.1.2037'), new \DateTime('1.1.2037'));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Starttime must be in the future
     */
//    public function testStarttimeMustBeInTheFuture()
//    {
//        new Auction('Auktionsname', 'Description', 0, new \DateTime('1.1.2000'), new \DateTime('1.1.2037'));
//    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Endtime must be in the future
     */
//    public function testEndtimeMustBeInTheFuture()
//    {
//        new Auction('Auktionsname', 'Description', 0, new \DateTime('1.1.2037'), new \DateTime('1.1.2000'));
//    }

}