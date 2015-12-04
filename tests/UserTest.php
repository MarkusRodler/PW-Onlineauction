<?php
declare(strict_types = 1);

namespace Dark\PW\Onlineauction;

/**
 * @covers \Dark\PW\Onlineauction\User
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCanNotBeEmpty()
    {
        new User('', 'test@test.de');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage E-Mail is not valid
     */
    public function testEmailCanNotBeEmpty()
    {
        new User('Dark', '');
    }
}