> ⚠️ **Important Notice**  
> This module and branch are no longer actively maintained. Please use the actively maintained fork by **Matjaz Potocnik** instead:  
> 👉 [https://github.com/matjazpotocnik/ProcessWire-AIOM-All-In-One-Minify](https://github.com/matjazpotocnik/ProcessWire-AIOM-All-In-One-Minify)  
> You can also find it in the official ProcessWire Modules Directory:  
> 🔗 [ProcessWire AllInOneMinify (AIOM)](https://processwire.com/modules/all-in-one-minify/)  
The namespaces have remained the same, so older versions can be replaced directly with the fork. You can now update the module again via the ProessWire Upgrade Module. Thanks to [Matjaz](https://processwire.com/modules/author/matjazp/) for maintaining and further developing the module!


# AIOM+ (All In One Minify)

#### Simple minify and parsing for CSS, LESS, JS and HTML

---

AIOM+ (All In One Minify) is a ProcessWire module to easily improve the performance of your website. By a simple function call, Stylesheets, LESS, and JavaScript files can be parsed, minimized, and combined into one single file. This reduces the server requests, loading time, and minimizes traffic. Additionally, the generated HTML source code can be minimized, and all generated files can be loaded over a cookieless domain (domain sharding).

---

## Information

- All paths are relative to the template folder. URLs in CSS files are automatically corrected — nothing needs to be changed.
- If you make changes to the source stylesheet, LESS, or JavaScript files, a new parsed and combined version is created automatically.
- All parameters can be adjusted via the backend.
- During development, you can enable developer mode. Files are parsed and combined but not minimized, and browser caching is prevented.
- You can use the short syntax `AIOM` or the full class name `AllInOneMinify` in your templates.
- The generated files can be delivered via a subdomain (domain sharding / cookieless domain).
- LESS files can be directly generated server-side on the fly, without plugins. AIOM+ includes a complete, high-performance PHP port of the official LESS processor.
- **Note:** There are a few unsupported LESS features:  
  - Evaluation of JavaScript expressions within back-ticks  
  - Definition of custom functions
- Conditional loading of files based on a ProcessWire API selector.

---

## Table of Contents

- [Installation](#installation)
- [Minimize Stylesheets and parse LESS files](#minimize-stylesheets-and-parse-less-files)
- [LESS variables access in multiple files](#less-variables-access-in-multiple-files)
- [Minimize JavaScripts](#minimize-javascripts)
- [Conditional loading](#conditional-loading)
- [Directory Traversal Filter](#directory-traversal-filter)
- [Already minimized files](#already-minimized-files-no-longer-minimized)
- [Exemplary template structure](#exemplary-template-structure)
- [Minimize HTML](#minimize-html)
- [Development mode](#development-mode)
- [Changelog](#changelog)
- [Questions or comments](#questions-or-comments)
- [Old stable version](#old-stable-version-needed)

---

## Installation

1. Copy the module files to `/site/modules/AllInOneMinify/`
2. In admin: **Modules > Check for new modules**
3. Install the module: **AIOM+ (All In One Minify) for CSS, LESS, JS and HTML**

**Alternative for ProcessWire 2.4**

1. Login to the PW backend and go to **Modules**
2. Click the **New** tab and enter: `AllInOneMinify`
3. Click **Download and Install**

---

## Minimize Stylesheets and parse LESS files

Single file minimization:

```php
<!-- CSS Stylesheet -->
<link rel="stylesheet" href="<?= AllInOneMinify::CSS('css/stylesheet.css'); ?>">

<!-- LESS file -->
<link rel="stylesheet" href="<?= AllInOneMinify::CSS('css/stylesheet.less'); ?>">
```

Combine multiple files into one (mixing CSS and LESS is supported):

```php
<link rel="stylesheet" href="<?= AllInOneMinify::CSS([
    'css/file-1.css',
    'css/file-2.less',
    'css/file-3.css',
    'css/file-4.less'
]); ?>">
```

**Tip:** You can also use the short syntax `AIOM::CSS()`.

---

## LESS variables access in multiple files

You can import and reuse variables across multiple LESS files:

```php
<link rel="stylesheet" href="<?= AllInOneMinify::CSS('css/color.less'); ?>">
<link rel="stylesheet" href="<?= AllInOneMinify::CSS('css/layout.less'); ?>">
```

**color.less**  
```less
@my-color: #ff0000;
```

**layout.less**  
```less
@import (reference) "css/color.less";

body {
  background-color: @my-color;
}
```

See [lesscss.org](https://lesscss.org) for full documentation.

---

## Minimize JavaScripts

Single file:

```php
<script src="<?= AllInOneMinify::JS('js/javascript.js'); ?>"></script>
```

Multiple files:

```php
<script src="<?= AllInOneMinify::JS([
    'js/file-1.js',
    'js/file-2.js',
    'js/file-3.js'
]); ?>"></script>
```

**Tip:** Short syntax: `AIOM::JS()`.

---

## Conditional loading

Since AIOM+ 3.1.1, you can load assets conditionally via ProcessWire selectors:

```php
<?php 
$stylesheets = [
    'css/reset.css',
    'css/main.less',
    [
        'loadOn' => 'id|template=1002|1004|sitemap',
        'files'  => ['css/special.css', 'css/special-theme.less']
    ]
];
?>
<link rel="stylesheet" href="<?= AllInOneMinify::CSS($stylesheets); ?>">
```

`loadOn` must be a [ProcessWire API selector](https://processwire.com/api/selectors/).

---

## Directory Traversal Filter

By default, only files within the ProcessWire template folder can be included.  
To include external files, enable **Allow Directory Traversal** in the backend config.

Example:

```php
AIOM::CSS('../third-party-packages/package/css/example.css');
```

All paths are automatically corrected.

---

## Already minimized files no longer minimized

Files containing `.min` or `-min` before their extension are skipped for minification:

- ✅ `file.js` → minimized  
- ❌ `file.min.js` → skipped  
- ✅ `file.css` → minimized  
- ❌ `file-min.css` → skipped

---

## Exemplary template structure

```
/site/
  templates/
    css/
    js/
```

---

## Minimize HTML

The generated HTML is automatically minimized at render time — no template changes required.  
Conditional comments, `<textarea>`, and `<code>` blocks are excluded.

**Note:** Whitespace between tags is removed. Use `&nbsp;` if spacing is required.  
See [#6](https://github.com/conclurer/ProcessWire-AIOM-All-In-One-Minify/issues/6).

---

## Development mode

Enable **Development Mode** under: `Modules > AIOM > Config`  
Files are combined but not minimized and refreshed on every request.  
A no-cache timestamp parameter is appended automatically, e.g.:

```
css_031ea978b0e6486c828ba444c6297ca5_dev.css?no-cache=1335939007
```

---

## Changelog

See the [full changelog on GitHub](https://github.com/conclurer/ProcessWire-AIOM-All-In-One-Minify/blob/master/README.md#changelog).

---

## Questions or comments

For bugs or feature requests, please open an issue on  
[GitHub](https://github.com/conclurer/ProcessWire-AIOM-All-In-One-Minify/issues).

---

## Old stable version

Find the old stable version without LESS support here:  
[AIOM (old Stable 2.2.2)](https://github.com/conclurer/ProcessWire-AIOM-All-In-One-Minify/tree/AIOM-(old-Stable-2.2.2))
