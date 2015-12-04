<?php
declare(strict_types = 1);

namespace Dark\PW\Onlineauction;

class Auction
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $startPrice;

    /**
     * @var \DateTime
     */
    private $starttime;

    /**
     * @var \DateTime
     */
    private $endtime;

    /**
     * @param string $name
     * @param string $description
     * @param integer $startPrice
     * @param \DateTime $starttime
     * @param \DateTime $endtime
     */
    public function __construct(string $name, string $description, int $startPrice, \DateTime $starttime, \DateTime $endtime)
    {
        $this->ensureNameIsNotEmpty($name);
        $this->ensureDescriptionIsNotEmpty($description);
        $this->ensureStartPriceIsPositive($startPrice);
        $this->ensureStarttimeIsInTheFuture($starttime);
        $this->ensureEndtimeIsInTheFuture($endtime);

        $this->name = $name;
        $this->description = $description;
        $this->startPrice = $startPrice;
        $this->starttime = $starttime;
        $this->endtime = $endtime;
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
     * @param string $description
     */
    private function ensureDescriptionIsNotEmpty(string $description)
    {
        if (strlen($description) === 0) {
            throw new \InvalidArgumentException('Empty description is not allowed');
        }
    }

    /**
     * @param int $startPrice
     */
    private function ensureStartPriceIsPositive(int $startPrice)
    {
        if ($startPrice < 0) {
            throw new \InvalidArgumentException('StartPrice must be positive');
        }
    }

    /**
     * @param \DateTime $starttime
     */
    private function ensureStarttimeIsInTheFuture(\DateTime $starttime)
    {
//        if ($starttime) {
//            throw new \InvalidArgumentException('Starttime must be in the future');
//        }
    }

    /**
     * @param \DateTime $endtime
     */
    private function ensureEndtimeIsInTheFuture(\DateTime $endtime)
    {
//        throw new \InvalidArgumentException('Endtime must be in the future');
    }
}