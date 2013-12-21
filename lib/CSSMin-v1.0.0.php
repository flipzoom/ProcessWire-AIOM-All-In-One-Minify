<?php

/**
 * @author  FlipZoom Media Inc. - David Karich
 * @contact David Karich <david.karich@flipzoom.de>
 * @website www.flipzoom.de
 * @create  2013-12-21
 * @style   Tab size: 4 / Soft tabs: NO
 * ----------------------------------------------------------------------------------
 * @licence
 * Copyright (c) 2013 FlipZoom Media Inc. - David Karich
 * Permission is hereby granted, free of charge, to any person obtaining a copy 
 * of this software and associated documentation files (the "Software"), to deal 
 * in the Software without restriction, including without limitation the rights 
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell 
 * copies of the Software, and to permit persons to whom the Software is furnished 
 * to do so, subject to the following conditions: The above copyright notice and 
 * this permission notice shall be included in all copies or substantial portions 
 * of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION 
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE 
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * ----------------------------------------------------------------------------------
 */

/**
 * ------------------------------------------------------------------------
 * CSS minimize class
 * ------------------------------------------------------------------------
 * CssMin is a css minfier. It minifies css by removing unneeded whitespace 
 * character, comments, empty blocks and empty declarations. In addition 
 * declaration values can get rewritten to shorter notation if available.
 */
class CssMin {

    /**
     * ------------------------------------------------------------------------
     * Minimizing the CSS code.
     * ------------------------------------------------------------------------
     * @param  string $_source The CSS code is to be minimized.
     * @return string          The minimized CSS code.
     */
    public function minify($_source) {

        // ------------------------------------------------------------------------
        // Shorten hex ​​values​​. For example, #ff0000 to #f00.
        // ------------------------------------------------------------------------
        $_source = preg_replace('/(?<![\'"])#([0-9a-z])\\1([0-9a-z])\\2([0-9a-z])\\3(?![\'"])/i', '#$1$2$3', $_source);
        
        // ------------------------------------------------------------------------
        // Remove all comments.
        // ------------------------------------------------------------------------
        $_source = preg_replace('/\/\*(.*?)\*\//is', '', $_source);

        // ------------------------------------------------------------------------
        // Remove the last semicolon within a block.
        // ------------------------------------------------------------------------
        $_source = preg_replace('/;?\s*}/', '}', $_source);

        // ------------------------------------------------------------------------
        // Remove any white space after a colon, comma, semicolon or a bracket.
        // ------------------------------------------------------------------------
        $_source = preg_replace('/\s*([\{:;,])\s*/', '$1', $_source);

        // ------------------------------------------------------------------------
        // Remove white space at the beginning and at the end.
        // ------------------------------------------------------------------------
        $_source = preg_replace('/^\s*|\s*$/m', '', $_source);

        // ------------------------------------------------------------------------
        // Remove all line breaks.
        // ------------------------------------------------------------------------
        $_source = preg_replace('/\n/', '', $_source);

        // ------------------------------------------------------------------------
        // Preserve empty comment after '>'
        // @see http://www.webdevout.net/css-hacks#in_css-selectors
        // ------------------------------------------------------------------------
        $_source = preg_replace('@>/\\*\\s*\\*/@', '>/*keep*/', $_source);
         
        // ------------------------------------------------------------------------
        // Preserve empty comment between property and value.
        // @see http://css-discuss.incutio.com/?page=BoxModelHack
        // ------------------------------------------------------------------------
        $_source = preg_replace('@/\\*\\s*\\*/\\s*:@', '/*keep*/:', $_source);
        $_source = preg_replace('@:\\s*/\\*\\s*\\*/@', ':/*keep*/', $_source);

        // ------------------------------------------------------------------------
        // Prevent triggering IE6 bug. 
        // @see http://www.crankygeek.com/ie6pebug/
        // ------------------------------------------------------------------------
        $_source = preg_replace('/:first-l(etter|ine)\\{/', ':first-l$1 {', $_source);

        // ------------------------------------------------------------------------
        // Subsequent improvements with Find and Replace.
        // ------------------------------------------------------------------------
        $search  = array(' !important', ' > ', ' + ', ', ');
        $replace = array('!important', '>', '+', ',');
        $_source = str_ireplace($search, $replace, $_source);

        // ------------------------------------------------------------------------
        // Remove empty blocks.
        // ------------------------------------------------------------------------
        $_source = preg_replace('/}[^\/}]+{}/', '}', $_source);

        // ------------------------------------------------------------------------
        // Return the minimized string.
        // ------------------------------------------------------------------------
        return $_source;
    }
}

?>
