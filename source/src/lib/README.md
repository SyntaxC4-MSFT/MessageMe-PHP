### Dependencies

> **Note:** These links are for attribution only. See [Installation Instructions][8] below to download the required dependencies.


* [Silex][5]
* [Windows Azure SDK for PHP][1]
  * [HTTP\_Request2][2]
  * [Mail\_mime][3]
  * [Mail\_mimeDecode][4]

<a name="install-instructions"></a>
### Installation Instructions

To limit the time needed to prepare for this demo, the dependencies will be downloaded with [Composer][6], a PHP package manager.

1. Download [Composer.phar][7] to the `lib` directory.
1. Ensure `Composer.json` contains:

   ```
{
	"repositories": [
		{
			"type": "pear",
			"url": "http://pear.php.net"
		}
	],
	"require": {
		"microsoft/windowsazure": "*",
		"silex/silex": ">=1.0",
		"twig/twig": ">=1.8,<2.0-dev"
	},
	"minimum-stability": "dev"
}
   ```

1. From the command line, run `php Composer.phar Install`.

   > **Note:** On Windows, you will also need to add the path to the Git executable to your PATH environment variable.

<!-- Links -->
[1]: http://github.com/WindowsAzure/azure-sdk-for-php
[2]: http://pear.php.net/package/HTTP_Request2
[3]: http://pear.php.net/package/Mail_mime
[4]: http://pear.php.net/package/Mail_mimeDecode
[5]: https://github.com/fabpot/Silex
[6]: http://getcomposer.org
[7]: http://getcomposer.org/composer.phar
[8]: #install-instructions