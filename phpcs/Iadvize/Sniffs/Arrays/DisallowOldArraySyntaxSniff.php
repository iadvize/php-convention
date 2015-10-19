<?php

/**
 * Class DisallowOldArraySyntax
 */
class Iadvize_Sniffs_Arrays_DisallowOldArraySyntaxSniff implements PHP_CodeSniffer_Sniff
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
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $phpcsFile->addError(
            'Old array syntax (array()) is not allowed use [] instead',
            $stackPtr,
            'Invalid'
        );
    }
}
