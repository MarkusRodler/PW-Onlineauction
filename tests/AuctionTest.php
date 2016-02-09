<?php
declare(strict_types = 1);

namespace Dark\PW\Onlineauction;

/**
 * @covers \Dark\PW\Onlineauction\Auction
 * @uses \Dark\PW\Onlineauction\User
 */
class AuctionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCanNotBeEmpty()
    {
        $creator = new User('DarkCreator', 'creator@test.de');
        new Auction($creator, '', 'Beschreibung', 1, new \DateTime('1.1.2037'), new \DateTime('1.1.2037'));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty description is not allowed
     */
    public function testDescriptionCanNotBeEmpty()
    {
        $creator = new User('DarkCreator', 'creator@test.de');
        new Auction($creator, 'Auktionsname', '', 1, new \DateTime('1.1.2037'), new \DateTime('1.1.2037'));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage StartPrice must be positive
     */
    public function testStartPriceMustBePositive()
    {
        $creator = new User('DarkCreator', 'creator@test.de');
        new Auction($creator, 'Auktionsname', 'Description', -1, new \DateTime('1.1.2037'), new \DateTime('1.1.2037'));
    }

    /**
     * expectedException InvalidArgumentException
     * expectedExceptionMessage Starttime must be in the future
     */
//    public function testStarttimeMustBeInTheFuture()
//    {
//        new Auction('Auktionsname', 'Description', 0, new \DateTime('1.1.2000'), new \DateTime('1.1.2037'));
//    }

    /**
     * expectedException InvalidArgumentException
     * expectedExceptionMessage Endtime must be in the future
     */
//    public function testEndtimeMustBeInTheFuture()
//    {
//        new Auction('Auktionsname', 'Description', 0, new \DateTime('1.1.2037'), new \DateTime('1.1.2000'));
//    }

    public function testUserCanBid()
    {
        $user = new User('Dark', 'test@test.de');
        $creator = new User('DarkCreator', 'creator@test.de');
        $auction = new Auction($creator, 'Auktionsname', 'Description', 0, new \DateTime('1.1.2037'), new \DateTime('1.1.2000'));
        $auction->bid($user, 1);
        
        $this->assertSame($user, $auction->getBidder());
        $this->assertSame(1, $auction->getBidprice());
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Bid cannot be below current bidprice
     */
    public function testBidCanNotBeBelowCurrentBidprice()
    {
        $user = new User('Dark', 'test@test.de');
        $creator = new User('DarkCreator', 'creator@test.de');
        $auction = new Auction($creator, 'Auktionsname', 'Description', 0, new \DateTime('1.1.2037'), new \DateTime('1.1.2000'));
        $auction->bid($user, 2);
        $auction->bid($user, 1);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Bid cannot be below current bidprice
     */
    public function testBidCanNotBeEqualToCurrentBidprice()
    {
        $user = new User('Dark', 'test@test.de');
        $creator = new User('DarkCreator', 'creator@test.de');
        $auction = new Auction($creator, 'Auktionsname', 'Desc', 0, new \DateTime('1.1.2037'), new \DateTime('1.1.2037'));
        $auction->bid($user, 1);
        $auction->bid($user, 1);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Creator cannot bid on his auction
     */
    public function testCreatorCanNotBidOnHisAuction()
    {
        $creator = new User('DarkCreator', 'creator@test.de');
        $auction = new Auction($creator, 'Auktionsname', 'Desc', 0, new \DateTime('1.1.2037'), new \DateTime('1.1.2037'));
        $auction->bid($creator, 1);
    }
}