<?php

namespace Iadvize\Sniffs\Formatting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Class NotMoreThanOneBlankLineSniff
 */
class NotMoreThanOneBlankLineSniff implements Sniff
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        return [
            T_WHITESPACE,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens        = $phpcsFile->getTokens();
        $currentToken  = $tokens[$stackPtr];
        $previousToken = $tokens[$stackPtr-1];

        if (
            $currentToken['line'] == $previousToken['line'] + 1 &&
            $currentToken['column'] === 1 &&
            $previousToken['column'] === 1 &&
            $currentToken['content'] === "\n" &&
            $previousToken['content'] === "\n"
        ) {
            $phpcsFile->addError('There must not be more than one blank line juxtaposed.', $stackPtr, 'Invalid');
        }
    }
}
