<?php

namespace Icetee\Nameday;

use \DateTime;
use Icetee\Nameday\Seeds\NamedayList;
use Icetee\Nameday\Traits\NamedayTail;

abstract class NamedayAbstract
{
    const DEFAULT_LANG = 'hu_HU';
    const ALLOW_LANGS = [
        'hu_HU',
        'pl_PL'
    ];

    /**
     * Date used for the calculation
     * @var DateTime
     */
    protected $date;

    /**
     * Name day language locale
     * @var string
     */
    protected $lang;

    /**
    * Defined PHP locale
    * @var string
    */
    protected $locale;

    /**
     * Set $date use for the calculation
     * @param DateTime $date
     *
     * @return self
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get $date use for the calculation
     * @return DateTime $date
     */
    public function getDate(string $format = null)
    {
        if (is_null($format)) {
            return $this->date;
        }

        return $this->date->format($format);
    }

    /**
     * Set name day language locale
     * @param string $lang
     *
     * @return self
     */
    public function setLang(string $lang)
    {
        if (in_array($lang, self::ALLOW_LANGS)) {
            $this->lang = $lang;
            $this->locale = setlocale(LC_ALL, substr($this->lang, 0, 2));
        }

        return $this;
    }

    /**
     * Get name day language locale
     * @return string $lang
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Get defined PHP locale
     * @return string $locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    public function isLeapYear()
    {
        return (boolean)$this->date->format('L');
    }

    public function isFebruary()
    {
        return (int)$this->date->format('m') === 2;
    }

    public function isLang(string $lang)
    {
        return $this->getLang() === $lang;
    }

    protected function isLeapFebruarHun()
    {
        return $this->isLeapYear()
            && $this->isFebruary()
            && $this->isLang('hu_HU');
    }
}
