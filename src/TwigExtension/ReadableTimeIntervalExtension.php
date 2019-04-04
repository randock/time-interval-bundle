<?php

declare(strict_types=1);

namespace Randock\TimeIntervalBundle\TwigExtension;

use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;
use Randock\TimeInterval\TimeInterval\TimeInterval;
use Randock\TimeInterval\ReadableTimeInterval\ReadableTimeIntervalGenerator;
use Randock\TimeInterval\ReadableTimeInterval\Exception\LocaleNotSupportedException;

class ReadableTimeIntervalExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('readableTimeIntervalFromSeconds', [$this, 'getReadableTimeTextFromSeconds']),
            new TwigFilter('readableTimeIntervalFromMinutes', [$this, 'getReadableTimeTextFromMinutes']),
            new TwigFilter('readableTimeIntervalFromHours', [$this, 'getReadableTimeTextFromHours']),
            new TwigFilter('readableTimeIntervalFromDays', [$this, 'getReadableTimeTextFromDays']),
        ];
    }

    /**
     * @param int $hours
     *
     * @throws LocaleNotSupportedException
     *
     * @return string
     */
    public function getReadableTimeText(TimeInterval $timeInterval, string $locale)
    {
        $readableTimeIntervalGenerator = new ReadableTimeIntervalGenerator($locale);

        return $readableTimeIntervalGenerator->getReadableTimeText($timeInterval->getInSeconds());
    }

    /**
     * @param int    $seconds
     * @param string $locale
     *
     * @throws LocaleNotSupportedException
     *
     * @return string
     */
    public function getReadableTimeTextFromSeconds(int $seconds, string $locale)
    {
        $timeInterval = TimeInterval::newFromHours($seconds);

        return $this->getReadableTimeText($timeInterval, $locale);
    }

    /**
     * @param int    $minutes
     * @param string $locale
     *
     * @throws LocaleNotSupportedException
     *
     * @return string
     */
    public function getReadableTimeTextFromMinutes(int $minutes, string $locale)
    {
        $timeInterval = TimeInterval::newFromMinutes($minutes);

        return $this->getReadableTimeText($timeInterval, $locale);
    }

    /**
     * @param int    $hours
     * @param string $locale
     *
     * @throws LocaleNotSupportedException
     *
     * @return string
     */
    public function getReadableTimeTextFromHours(int $hours, string $locale)
    {
        $timeInterval = TimeInterval::newFromHours($hours);

        return $this->getReadableTimeText($timeInterval, $locale);
    }

    /**
     * @param int    $days
     * @param string $locale
     *
     * @throws LocaleNotSupportedException
     *
     * @return string
     */
    public function getReadableTimeTextFromDays(int $days, string $locale)
    {
        $timeInterval = TimeInterval::newFromDays($days);

        return $this->getReadableTimeText($timeInterval, $locale);
    }
}
