<?php
namespace Craft;

/**
 * Class RequireLogin_Node
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @see       http://buildwithcraft.com
 * @package   craft.app.etc.templating.twigextensions
 * @since     1.0
 */
class RequireLogin_Node extends \Twig_Node
{
	////////////////////
	// PUBLIC METHODS
	////////////////////

	/**
	 * Compiles a RequireLogin_Node into PHP.
	 *
	 * @param \Twig_Compiler $compiler
	 *
	 * @return null
	 */
	public function compile(\Twig_Compiler $compiler)
	{
		$compiler
		    ->addDebugInfo($this)
		    ->write("\Craft\craft()->userSession->requireLogin();\n");
	}
}
