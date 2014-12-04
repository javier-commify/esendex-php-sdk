<?php
/**
 * Copyright (c) 2013, Esendex Ltd.
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of Esendex nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   Model
 * @package    Esendex
 * @author     Esendex Support <support@esendex.com>
 * @copyright  2013 Esendex Ltd.
 * @license    http://opensource.org/licenses/BSD-3-Clause  BSD 3-Clause
 * @link       https://github.com/esendex/esendex-php-sdk
 */
namespace Esendex\Model;

use Esendex\Exceptions\ArgumentException;

class MessageBody
{
    const CharsetGSM = "GSM";
    const CharsetUnicode = "Unicode";
    const CharsetAuto = "Auto";
    
    private $bodyText;
    private $characterSet;

    /**
     * @param string $value
     * @return string
     */
    public function bodyText($value = null)
    {
        if ($value != null) {
            $this->bodyText = (string)$value;
        }
        return $this->bodyText;
    }

    /**
     * @param string $value
     * @return string
     * @throws \Esendex\Exceptions\ArgumentException
     */
    public function characterSet($value = null)
    {
        if ($value != null) {
            if ($value != self::CharsetGSM && $value != self::CharsetUnicode) {
                throw new ArgumentException("characterSet() value was '{$value}' and must be either '" . self::CharsetGSM . "' or '" . self::CharsetUnicode . "'");
            }
            $this->characterSet = (string)$value;
        }
        return $this->characterSet;
    }

    public function __toString()
    {
        return $this->bodyText;
    }
}
