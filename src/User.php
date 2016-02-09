<?php
declare(strict_types = 1);

namespace Dark\PW\Onlineauction;

class User
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @todo: Email abändern in Typ Email anstatt string
     * @param string $name
     * @param string $email
     */
    public function __construct(string $name, string $email)
    {
        $this->ensureNameIsNotEmpty($name);
        $this->ensureEmailIsValid($email);
        $this->name = $name;
        $this->email = $email;
    }
    
    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    
    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @param string $name
     */
    private function ensureNameIsNotEmpty(string $name)
    {
        if (strlen($name) === 0) {
            throw new \InvalidArgumentException('Empty name is not allowed');
        }
    }

    /**
     * @param string $email
     */
    private function ensureEmailIsValid(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('E-Mail is not valid');
        }
    }
}