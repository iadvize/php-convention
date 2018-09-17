<?php

namespace Iadvize\Sniffs\ControlStructures;

use PHP_CodeSniffer\Sniffs\AbstractPatternSniff;

/**
 * Verifies that control statements conform to their coding standards.
 *
 * @package Iadvize\Sniffs\ControlStructures
 */
class ControlSignatureSniff extends AbstractPatternSniff
{
    /** @var array A list of tokenizers this sniff supports. */
    public $supportedTokenizers = ['PHP', 'JS'];

    /** @var array $patterns A list of patterns this sniff verifies. */
    public $patterns = [
        'switch (...) {EOL',
    ];

    /**
    * Returns the patterns that this test wishes to verify.
    *
    * @return array(string)
    */
    protected function getPatterns()
    {
        return $this->patterns;
    }
}
