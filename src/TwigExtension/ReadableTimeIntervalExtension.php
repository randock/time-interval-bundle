<?php


namespace Randock\TimeIntervalBundle\TwigExtension;


use Randock\TimeInterval\ReadableTimeInterval\ReadableTimeIntervalGenerator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ReadableTimeIntervalExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('readableTimeInterval', [ReadableTimeIntervalGenerator::class, 'readableTimeInterval']),
        ];
    }
}
