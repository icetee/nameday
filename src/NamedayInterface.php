<?php

namespace Icetee\Nameday;

use DateTime;

interface NamedayInterface
{
    public function setDate(DateTime $date);

    public function getDate(string $format);

    public function setLang(string $lang);

    public function getLang();

    public function getAllNameDay();

    public function getNameDay();

    public function isLeapYear();

    public function isFebruary();

    public function isLang(string $lang);
}
