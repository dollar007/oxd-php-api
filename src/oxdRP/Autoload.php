<?php
/**
 * Gluu-oxd-library
 *
 * An open source application library for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Gluu inc, USA, Austin
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Gluu-oxd-library
 * @version 2.4.2
 * @author	Vlad Karapetyan
 * @author		vlad.karapetyan.1988@mail.ru
 * @copyright	Copyright (c) 2015 - 2016, Gluu inc federation (https://gluu.org/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://gluu.org/
 * @since	Version 2.4.2
 * @filesource
 */

/**
 * Autoload class
 *
 * Class is basic, which is loading all classes
 *
 * @package		Gluu-oxd-library
 * @subpackage	Libraries
 * @category	Base class for all protocols
 * @author		Vlad Karapetyan
 * @author		vlad.karapetyan.1988@mail.ru
 */

namespace oxdrp;


$treasure_data_loader = new Autoload(__DIR__, __NAMESPACE__);
spl_autoload_register(array($treasure_data_loader, 'loadClass'));

class Autoload
{
    protected $path;
    protected $ns;
    protected $ns_sep = '\\';
    protected $suffix = '.php';

    public function __construct($path, $ns)
    {
        $this->path = $path;
        $this->ns = $ns;
    }

    public function loadClass($name)
    {
        if (strpos($name, $this->ns) !== 0) {
            return ;
        }

        $classname = $name;
        $filename = $this->path
            . DIRECTORY_SEPARATOR
            . str_replace(
                $this->ns_sep,
                DIRECTORY_SEPARATOR,
                substr($classname, strpos($classname, $this->ns_sep) + 1))
            . $this->suffix;

        return $this->loadFile($filename);
    }

    public function loadFile($filename)
    {
        if (is_readable($filename)) {
            return require_once $filename;
        }
        return false;
    }
}
