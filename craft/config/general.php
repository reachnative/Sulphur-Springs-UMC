<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

return array(

	// Base site URL
	'.dev' => array(
			'siteUrl' => 'http://sulphurspringsumc.dev:8888',
	),

	'.com' => array(
			'siteUrl' => 'http://www.sulphurspringsumc.com',
	),

	// Environment-specific variables (see https://craftcms.com/docs/multi-environment-configs#environment-specific-variables)
	'environmentVariables' => array(),

	// Default Week Start Day (0 = Sunday, 1 = Monday...)
	'defaultWeekStartDay' => 0,

	// Enable CSRF Protection (recommended, will be enabled by default in Craft 3)
	'enableCsrfProtection' => true,

	// Whether "index.php" should be visible in URLs (true, false, "auto")
	'omitScriptNameInUrls' => 'auto',

	// Control Panel trigger word
	'cpTrigger' => 'admin',

	// Dev Mode (see https://craftcms.com/support/dev-mode)
	'devMode' => false,

	//Omit index.php in URLs
	'omitScriptNameInUrls' => true,

	//CSRF Protection
	'enableCsrfProtection' => true,

);
