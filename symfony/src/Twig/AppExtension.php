<?php

namespace App\Twig;

use Jdenticon\Identicon;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('identicon', [$this, 'getIdenticon']),
        ];
    }

    // public function getFunctions(): array
    // {
    //     return [
    //         new TwigFunction('function_name', [$this, 'doSomething']),
    //     ];
    // }

    public function getIdenticon($value)
    {
        $icon = new Identicon();
        $icon->setValue(md5($value));
        //taille en pixel
        $icon->setSize(32);

        return 'data:image/png;base64, ' . base64_encode($icon->getImageData('png'));
    }
}
