<?php
namespace LK\TwigstringBundle\Tests\DependencyInjection;

use LK\TwigstringBundle\DependencyInjection\LKTwigstringExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class LKTwigstringExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** @var Extension $extension */
    private $extension;

    /** @var ContainerBuilder $container */
    private $container;

    protected function setUp()
    {
        $this->extension = new LKTwigstringExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);

        $this->container->register('templating.name_parser', true);
        $this->container->register('templating.locator', true);
    }

    public function testConfiguration()
    {
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();

        $this->assertTrue($this->container->has('templating.engine.twigstring'));
        $this->assertTrue($this->container->hasExtension('lk_twigstring'));
    }
}