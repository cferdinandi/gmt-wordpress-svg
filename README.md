# WordPress SVG
Adds SVG support to the WordPress Media Library, and an `[svg]` shortcode for inlining SVGs.



## Getting Started

Getting started with WordPress SVG is as simple as installing a plugin:

1. Upload the `wordpress-svg` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the Plugins menu in WordPress.

To make sure you always get the latest updates, it’s recommended that you also install the [GitHub Updater plugin](https://github.com/afragen/github-updater).



## SVG Shortcode

WordPress SVG adds a shortcode that lets you inline SVGs in the WordPress editor for more flexibility with styling.

1. Upload your SVG to the WordPress Media Library.
2. Copy the SVG URL.
3. Add the `[svg]` shortcode your the WordPress editor:

	```php
	[svg url="http://yoursite.com/path/to/your/svgfile.svg"]
	```

You can add clases to your SVG by also passing in the `class` attribute:

```php
[svg class="icon icon-large" url="svgfile.svg"]
```



## How to Contribute

To contribute to this project, please consult the [Contribution Guidelines](CONTRIBUTING.md).



## License

The code is available under the [MIT License](LICENSE.md).