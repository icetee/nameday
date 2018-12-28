<?php

use Icetee\Nameday\Nameday;
use Icetee\Nameday\Seeds\NamedayList;

class NamedayTest extends PHPUnit\Framework\TestCase
{
    private $underTest;

    public function setUp()
    {
        $this->underTest = new Nameday();
    }

    /**
     * @test
     */
    public function it_should_return_datetime()
    {
        $date = $this->underTest->getDate();

        $this->assertInstanceOf(DateTime::class, $date);
    }

    /**
     * @test
     */
    public function it_should_return_default_lang()
    {
        $lang = $this->underTest->getLang();

        $this->assertSame(Nameday::DEFAULT_LANG, $lang);
    }

    /**
     * @test
     */
    public function it_should_return_correct_values_with_new_instance()
    {
        $now = new DateTime('now');
        $nameday = new Nameday($now, Nameday::DEFAULT_LANG);

        $date = $nameday->getDate();
        $lang = $nameday->getLang();

        $this->assertSame($now, $date);
        $this->assertSame(Nameday::DEFAULT_LANG, $lang);
    }

    /**
     * @test
     */
    public function it_should_return_all_nameday()
    {
        $list = $this->underTest->getAllNameDay();

        $this->assertSame(NamedayList::getNamedays(), $list);
    }

    /**
     * @test
     */
    public function it_should_return_bool_from_leap_year()
    {
        $isLeapYear = $this->underTest->isLeapYear();

        $this->assertInternalType('boolean', $isLeapYear);
    }

    /**
     * @test
     */
    public function it_should_return_true_from_leap_year_2018()
    {
        $date = new DateTime('2018-01-01');
        $nameday = new Nameday($date, Nameday::DEFAULT_LANG);
        $isLeapYear = $nameday->isLeapYear();

        $this->assertSame(false, $isLeapYear);
    }

    /**
     * @test
     */
    public function it_should_return_false_from_leap_year_2000()
    {
        $date = new DateTime('2000-01-01');
        $nameday = new Nameday($date, Nameday::DEFAULT_LANG);
        $isLeapYear = $nameday->isLeapYear();

        $this->assertSame(true, $isLeapYear);
    }

    /**
     * @test
     */
    public function it_should_return_hu_from_default_locale()
    {
        $locale = $this->underTest->getLocale();

        $this->assertSame('hu', $locale);
    }

    /**
     * @test
     */
    public function it_should_return_pl_from_po_locale()
    {
        $date = new DateTime('2000-01-01');
        $nameday = new Nameday($date, 'pl_PL');

        $locale = $nameday->getLocale();

        $this->assertSame('pl', $locale);
    }

    /**
     * @test
     */
    public function it_should_return_true_is_february_in_february()
    {
        $date = new DateTime('2000-02-01');
        $nameday = new Nameday($date, Nameday::DEFAULT_LANG);

        $isFebruary = $nameday->isFebruary();

        $this->assertSame(true, $isFebruary);
    }

    /**
     * @test
     */
    public function it_should_return_false_is_february_in_not_february()
    {
        $date = new DateTime('2000-03-01');
        $nameday = new Nameday($date, Nameday::DEFAULT_LANG);

        $isFebruary = $nameday->isFebruary();

        $this->assertSame(false, $isFebruary);
    }

    /**
     * @test
     */
    public function it_should_return_true_from_is_default_lang()
    {
        $isLang = $this->underTest->isLang(Nameday::DEFAULT_LANG);

        $this->assertSame(true, $isLang);
    }

    /**
     * @test
     */
    public function it_should_return_false_from_is_po_lang()
    {
        $isLang = $this->underTest->isLang('pl_PL');

        $this->assertSame(false, $isLang);
    }

    /**
     * @test
     */
    public function it_should_return_jan_1_default_names()
    {
        $date = new DateTime('2000-01-01');
        $nameday = new Nameday($date, Nameday::DEFAULT_LANG);

        $namedays = $nameday->getNameDay();
        $names = NamedayList::getNamedays()[Nameday::DEFAULT_LANG][1][0];

        $this->assertSame($names, $namedays);
    }

    /**
     * @test
     */
    public function it_should_return_silvester_in_dec_31()
    {
        $date = new DateTime('2000-12-31');
        $nameday = new Nameday($date, Nameday::DEFAULT_LANG);

        $namedays = $nameday->getNameDay();
        $names = NamedayList::getNamedays()[Nameday::DEFAULT_LANG][12][31 - 1];

        $this->assertSame($names, $namedays);
    }

    /**
     * @test
     */
    public function it_should_return_2_names_with_limits()
    {
        $limit = 2;
        $lang = 'pl_PL';
        $date = new DateTime('2000-01-02');
        $nameday = new Nameday($date, $lang);

        $namedays = $nameday->getNameDay($limit);

        $this->assertCount($limit, $namedays);
    }

    /**
     * @test
     */
    public function it_should_return_hun_leapname_in_feb_24()
    {
        $date = new DateTime('2000-02-24');
        $nameday = new Nameday($date, Nameday::DEFAULT_LANG);

        $namedays = $nameday->getNameDay();
        $leapNames = NamedayList::getLeapNames()[Nameday::DEFAULT_LANG];

        $this->assertSame($leapNames, $namedays[0]);
    }
}
