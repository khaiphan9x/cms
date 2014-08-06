<?php
namespace Craft;

/**
 * Class Hook_TokenParser
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @see       http://buildwithcraft.com
 * @package   craft.app.etc.templating.twigextensions
 * @since     1.3
 */
class Hook_TokenParser extends \Twig_TokenParser
{
	////////////////////
	// PUBLIC METHODS
	////////////////////

	/**
	 * Defines the tag name.
	 *
	 * @return string
	 */
	public function getTag()
	{
		return 'hook';
	}

	/**
	 * Parses {% hook %} tags.
	 *
	 * @param \Twig_Token $token
	 *
	 * @return Hook_Node
	 */
	public function parse(\Twig_Token $token)
	{
		$lineno = $token->getLine();
		$hook = $this->parser->getExpressionParser()->parseExpression();
		$this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

		return new Hook_Node(array('hook' => $hook), array(), $lineno, $this->getTag());
	}
}
