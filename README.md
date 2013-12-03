#ProcessWire – AIOM (All In One Minify)#

####Simple minify for CSS, JS and HTML####
-----------------------------

**AIOM (All In One Minify) is a module to easily improve the performance of the website. By a simple function call Stylesheets and Javascript files can be minimized and combined into one file. This reduces the requests and minimizes the traffic. In addition, the generated HTML source code is minimized.**

- - - 

####Information####

* All the paths for the minimization are relative to the template folder.
* The maximum lifetime of the generated files is 4 weeks. This can be changed via the configuration in the module.
* The generated files can be equipped with a prefix.
* A file is generated which is composed according to this scheme: **prefix_md5-timestamp.extension** for example: **css_031ea978b0e6486c828ba444c6297ca5.css** – _There is no modification of the. HTACCESS file is necessary._

- - - 

##Minimize Stylesheets##

Minimization of a single file.

```html+php
<link rel="stylesheet" type="text/css" href="<?php echo AllInOneMinify::CSS('css/stylesheet.css'); ?>">
```

Minimize multiple files into one file.

```html+php
<link rel="stylesheet" href="<?php echo AllInOneMinify::CSS(array('css/file-1.css', 'css/file-2.css', 'css/file-3.css', 'css/file-4.css')); ?>">
```

- - - 

##Minimize Javascripts##

Minimization of a single file.

```html+php
<script src="<?php echo AllInOneMinify::JS('js/javascript.js'); ?>"></script>
```

Minimize multiple files into one file.

```html+php
<script src="<?php echo AllInOneMinify::JS(array('js/file-1.js', 'js/file-2.js', 'js/file-3.js', 'js/file-4.js')); ?>"></script>
```

- - - 

##Exemplary template structure##

/
site/
    templates/
        css/
        js/
