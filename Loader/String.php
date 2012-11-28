<?php

/*
 * This file is part of the TwigString bundle
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LK\TwigstringBundle\Loader;

class String extends \Twig_Loader_String
{
	public function load($name) {
		return new $name;
	}

}
