#ifndef PHP_INTEGER_MATH_H
    #define PHP_INTEGER_MATH_H

    extern zend_module_entry integer_math_module_entry;
    #define phpext_integer_math_ptr &integer_math_module_entry

    #define PHP_INTEGER_MATH_VERSION "7.3"
    #define PHP_INTEGER_MATH_EXTNAME "Integer Math"

    #ifdef ZTS
        #include "TSRM.h"
    #endif

    #if defined(ZTS) && defined(COMPILE_DL_INTEGER_MATH)
        ZEND_TSRMLS_CACHE_EXTERN();
    #endif
#endif