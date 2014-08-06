<?php
namespace Craft;

/**
 * Class UrlValidator
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @see       http://buildwithcraft.com
 * @package   craft.app.validators
 * @since     1.0
 */
class UrlValidator extends \CUrlValidator
{
	////////////////////
	// PROPERTIES
	////////////////////

	/**
	 * @var string Override the $pattern regex so that a TLD is not required, and the protocol may be relative.
	 */
	public $pattern = '/^(?:(?:{schemes}:)?\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)?|\/)[^\s]*$/i';

	////////////////////
	// PUBLIC METHODS
	////////////////////

	/**
	 * Add support for protocol-relative URLs. {@see http://paulirish.com/2010/the-protocol-relative-url/}
	 *
	 * @param string $value
	 *
	 * @return string
	 */
	public function validateValue($value)
	{
		// Ignore URLs with any environment variables in them
		if (mb_strpos($value, '{') !== false)
		{
			return $value;
		}

		if ($this->defaultScheme !== null && strncmp($value, '/', 1) === 0)
		{
			$this->defaultScheme = null;
		}

		return parent::validateValue($value);
	}
}
