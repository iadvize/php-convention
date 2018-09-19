<?php
namespace Iadvize\Sniffs\Arrays;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Class DisallowOldArraySyntax
 */
class DisallowOldArraySyntaxSniff implements Sniff
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        return [
            T_ARRAY,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $phpcsFile->addError(
            'Old array syntax (array()) is not allowed use [] instead',
            $stackPtr,
            'Invalid'
        );
    }
}
