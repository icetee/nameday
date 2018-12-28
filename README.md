# Name day

[![Build Status](https://drone.webmonkey.hu/api/badges/icetee/nameday/status.svg)](https://drone.webmonkey.hu/icetee/nameday)

A name day is a tradition in some countries in Europe, Latin America, and Roman Catholic and Eastern Orthodox countries in general. It consists of celebrating a day of the year that is associated with one's given name. The celebration is similar to a birthday.

### Load with composer

The simplest solution is to call the package when using a composer. This cli command, install the package.

```
composer require icetee/nameday
```

### Usage

**Create instance:**

```php
$nameday = new \Icetee\Nameday\Nameday(DateTime $date = null, $lang = null);
```

**Get current name days:**

```php
$names = nameday->getNameDay(int $limit = 0);
```

Dump of `$names` *(it is always an array)*:

```php
["Tamás", "Tamara"]
```
