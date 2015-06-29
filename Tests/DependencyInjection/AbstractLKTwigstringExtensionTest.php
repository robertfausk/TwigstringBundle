<?php
namespace Tests\DependencyInjection;

use LK\TwigstringBundle\DependencyInjection\LKTwigstringExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

abstract class AbstractLKTwigstringExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $extension;
    private $container;

    protected function setUp()
    {
        $this->extension = new LKTwigstringExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    abstract protected function loadConfiguration(ContainerBuilder $container, $resource);

    public function testConfiguration()
    {
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();

        $this->assertTrue($this->container->has('twigstring'));
    }
}