<?php

namespace Icetee\Nameday;

use \DateTime;
use Icetee\Nameday\Seeds\NamedayList;

class Nameday extends NamedayAbstract implements NamedayInterface
{
    public function __construct(DateTime $date = null, $lang = null)
    {
        if (is_null($date)) {
            $date = new DateTime('now');
        }

        if (is_null($lang)) {
            $lang = self::DEFAULT_LANG;
        }

        $this->setDate($date);
        $this->setLang($lang);
    }

    /**
    * Get all name days
    * @return array $nameday
    */
    public function getAllNameDay()
    {
        return NamedayList::getNamedays();
    }

    /**
     * Get actual name days
     * @param int $limit - element size
     *
     * @return array $nameday
     */
    public function getNameDay(int $limit = 0)
    {
        $namedays = [];
        $orig_days = $this->getDate('j');
        $days = $orig_days;

        if ($this->isLeapFebruarHun()) {
            if ($days > 24) {
                $days--;
            }
        }

        if ($this->isLeapFebruarHun() && $orig_days == 24) {
            $namedays = [NamedayList::getLeapNames()[$this->getLang()]];
        } else {
            $langNames = NamedayList::getNamedays()[$this->getLang()];
            $langNamesMonth = $langNames[$this->getDate('n')];
            $langNamesDay = $langNamesMonth[$days - 1];

            if ($limit > 0) {
                $namedays = array_slice($langNamesDay, 0, $limit);
            } else {
                $namedays = $langNamesDay;
            }
        }

        return $namedays;
    }
}
