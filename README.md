#ProcessWire – AIOM (All In One Minify)#

####Simple minify for CSS, JS and HTML####
-----------------------------

AIOM (All In One Minify) is a module to easily improve the performance of the website. By a simple function call Stylesheets and Javascript files can be minimized and combined into one file. This reduces the requests and minimizes the traffic. In addition, the generated HTML source code is minimized.

- - - 

####Information####

* All the paths for the minimization are relative to the template folder.
* The maximum lifetime of the generated files is 4 weeks. This can be changed via the configuration in the module.
* A file is generated which is composed according to this scheme: **prefix_md5-timestamp.extension** for example: css_031ea978b0e6486c828ba444c6297ca5.css – ___There is no modification of the .htaccess file is necessary.___
* If you change something in the source CSS or JS files, a new combined version is created automatically.

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

**Tip:** You can also use the short syntax **"AIOM"**. For example, **"AIOM::CSS()**".

##Minimize Javascripts##

Minimization of a single file.

```html+php
<script src="<?php echo AllInOneMinify::JS('js/javascript.js'); ?>"></script>
```

Minimize multiple files into one file.

```html+php
<script src="<?php echo AllInOneMinify::JS(array('js/file-1.js', 'js/file-2.js', 'js/file-3.js', 'js/file-4.js')); ?>"></script>
```

**Tip:** You can also use the short syntax **"AIOM"**. For example, **"AIOM::JS()**".

##Exemplary template structure##

```/
site/
    templates/
        css/
        js/
```

##Minimize HTML##

The generated HTML source code is automatically minimized when rendering. This requires no change to the templates must be made. Conditional Comments, textareas, code tags, etc. is excluded from the minimization.

##Development mode##

If you are currently in development of the site, caching can be a problem. For this, you can enable the development mode since version 1.1.0. The files will be combined, but not minimized and re-generated at each call. In addition, a no-cache GET parameter is appended with a timestamp to prevent the browser caching.  
**For example: css_031ea978b0e6486c828ba444c6297ca5_dev.css?no-cache=1335939007**

```php
// ------------------------------------------------------------------------
// Enable or disable development mode (Combine but no minimizing)
// ------------------------------------------------------------------------
private static $developmentMode = true;
```

To enable the development mode, set the value of variable **"private static $developmentMode"** in the file **"AllInOneMinify.module"** to **"true"**. We are working to make this editable via the backend.

##Changelog##

1.1.0  

* BugFix ([#1](https://github.com/FlipZoomMedia/ProcessWire-AIOM-All-In-One-Minify/issues/1)): Error: Exception: RecursiveDirectoryIterator ... Permission denied (Thanks to JoZ3 and Ryan)
* New Short-Syntax AIOM::CSS(); and AIOM::JS();
* New default settings for css minify (speed up minimizing)
* New option: enable/disable HTML minify
* New option: enable/disable development mode (combine but no minimizing)
* Some optimizations
 
1.0.0  
* Initial release

##Questions and comments?##

Send me an E-Mail with your questions, suggestions or bugs to support@flipzoom.de. 

##Test environment##

* ProcessWire in Version 2.3
* Windows (WAMP) / Linux (CentOS 6.4/6.5)
* PHP 5.3.3, 5.5.3
* Apache 2.2.21

##To-do##

* Compile the CSS and JS files when saving / updating the template in the admin area.
* Configuration via the backend
* .htaccess Improvement Tips
* Development mode
* Inline minimizing for css and js in HTML source code

- - - 

__Best regards,__  
Dave
