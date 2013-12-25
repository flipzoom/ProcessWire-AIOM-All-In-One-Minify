#ProcessWire – AIOM (All In One Minify)#

####Simple minify for CSS, JS and HTML####
-----------------------------

AIOM (All In One Minify) is a module to easily improve the performance of the website. By a simple function call Stylesheets and Javascript files can be minimized and combined into one file. This reduces the requests and minimizes the traffic. In addition, the generated HTML source code is minimized.

- - - 

####Information####

* All paths are relative to the template folder. URLs will be automatically corrected. Nothing needs to be changed.
* If you make changes to the source stylesheet and javascript files, a new combined version is created automatically.
* All parameters can be adjusted via the backend.
* During development, you can enable developer mode. Files are combined, but not minimized and browser caching is prevented.
* You can use the short syntax or use the full class name.

##Installation##

1. Copy the files for this module to /site/modules/AllInOneMinify/
2. In admin: Modules > Check for new modules. Install Module > AIOM (All In One Minify) for CSS, JS and HTML.

##Minimize Stylesheets##

Minimization of a single file.

```html+php
<link rel="stylesheet" type="text/css" href="<?php echo AllInOneMinify::CSS('css/stylesheet.css'); ?>">
```

Minimize multiple files into one file.

```html+php
<link rel="stylesheet" href="<?php echo AllInOneMinify::CSS(array('css/file-1.css', 'css/file-2.css', 'css/file-3.css', 'css/file-4.css')); ?>">
```

**Tip:** You can also use the short syntax **"AIOM"**. For example, ```AIOM::CSS()```.

##Minimize Javascripts##

Minimization of a single file.

```html+php
<script src="<?php echo AllInOneMinify::JS('js/javascript.js'); ?>"></script>
```

Minimize multiple files into one file.

```html+php
<script src="<?php echo AllInOneMinify::JS(array('js/file-1.js', 'js/file-2.js', 'js/file-3.js', 'js/file-4.js')); ?>"></script>
```

**Tip:** You can also use the short syntax **"AIOM"**. For example, ```AIOM::JS()```.

##Already minimized files no longer minimized##

To further enhance the performance and to give you maximum flexibility in the combining process, you now have the option to exclude certain files from the minimization (since version 2.2). All files that have the abbreviation ".min" or "-min" at the end of the file name and before the file extension, are no longer minimized. For example: ```file-1.js``` is minimized. ```file-1-min.js``` or ```file-1.min.js``` is not minimized. The same for CSS. ```file-1.css``` is minimized. ```file-1-min.css``` or ```file-1.min.css``` is not minimized.

##Exemplary template structure##

```/
site/
    templates/
        css/
        js/
```

##Minimize HTML##

The generated HTML source code is automatically minimized when rendering. This requires no change to the templates. Conditional Comments, textareas, code tags, etc. are excluded from the minimization.

**NOTE**: AIOM removes all whitespaces between two tags. If you explicitly need a whitespace, change the whitespace into an HTML entity: ```&nbsp;```. See ([#6](https://github.com/FlipZoomMedia/ProcessWire-AIOM-All-In-One-Minify/issues/6))

##Development mode##

If you are currently in development of the site, caching can be a problem. For this, you can enable the development mode since version 1.1.0 in the Backend (Module > AIOM > Config). The files will be combined, but not minimized and re-generated at each call. In addition, a no-cache GET parameter is appended with a timestamp to prevent the browser caching. For example: ```css_031ea978b0e6486c828ba444c6297ca5_dev.css?no-cache=1335939007```

##Changelog##

2.2.2 

* BugFix ([#8](https://github.com/FlipZoomMedia/ProcessWire-AIOM-All-In-One-Minify/issues/8)): Many errors if debug mode is activated (Thanks to JoZ3)
* Better error handling

2.2.1

* Code Corrections / class name

2.2.0

* New feature: File is not minimized when ".min" or "-min" is at the end of the filename. For example: ```file-1.min.js```.
* Update CSSMin library to Version 1.1 (inspired by Yahoo! YUI compressor)
* Update JSMin library to Version 2.7.1 (Security fix, recommended update)
* Performance improvements on first minification

2.1.1

* Old code removed
* Cleanup

2.1.0

* New CSS minimization library
* Performance improvements

2.0.0

* Configurable backend (Prefix, lifetime, dev-mode and tips)
* Empty cache on the backend
* Domain sharding / cookieless domain
* Domain sharding for SSL
* Performance improvements
* Quick introduction in the backend
* Performance tips in the backend
* .htaccess instructions for domain sharding in the backend

1.1.1  

* CSS filter update

1.1.0  

* BugFix ([#1](https://github.com/FlipZoomMedia/ProcessWire-AIOM-All-In-One-Minify/issues/1)): Error: Exception: RecursiveDirectoryIterator ... Permission denied (Thanks to JoZ3 and Ryan)
* New Short-Syntax AIOM::CSS(); and AIOM::JS();
* New default settings for css minify (speed up minimizing)
* New option: enable/disable HTML minify
* New option: enable/disable development mode (combine but no minimizing)
* Some optimizations
 
1.0.0  
* Initial release

##Questions or comments?##

My Name is David Karich. Send me an E-Mail with your questions, suggestions or bugs to support@flipzoom.de. 

##Test environment##

* ProcessWire in Version 2.3
* Windows (WAMP) / Linux (CentOS 6.4/6.5)
* PHP 5.3.3, 5.5.3
* Apache 2.2.21
