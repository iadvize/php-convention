<?php

if (class_exists('PHP_CodeSniffer_Standards_AbstractPatternSniff', true) === false) {
    throw new PHP_CodeSniffer_Exception('Class PHP_CodeSniffer_Standards_AbstractPatternSniff not found');
}

/**
 * Verifies that control statements conform to their coding standards.
 *
 * @package   PHP_CodeSniffer
 */
class Iadvize_Sniffs_ControlStructures_ControlSignatureSniff extends PHP_CodeSniffer_Standards_AbstractPatternSniff
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
