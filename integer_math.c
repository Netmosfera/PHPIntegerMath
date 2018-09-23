#ifdef HAVE_CONFIG_H
    #include "config.h"
#endif

#include "php.h"
#include "ext/standard/info.h"
#include "php_integer_math.h"

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(integer_math_add_arg_info, 0, 1, IS_LONG, 0)
    ZEND_ARG_TYPE_INFO(0, augend, IS_LONG, 0)
    ZEND_ARG_TYPE_INFO(0, addend, IS_LONG, 0)
ZEND_END_ARG_INFO()

PHP_FUNCTION(IntAdd){
    zend_long augend;
    zend_long addend;

    ZEND_PARSE_PARAMETERS_START(2, 2)
        Z_PARAM_LONG(augend)
        Z_PARAM_LONG(addend)
    ZEND_PARSE_PARAMETERS_END();

    RETURN_LONG(augend + addend);
}

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(integer_math_subtract_arg_info, 0, 1, IS_LONG, 0)
    ZEND_ARG_TYPE_INFO(0, minuend, IS_LONG, 0)
    ZEND_ARG_TYPE_INFO(0, subtrahend, IS_LONG, 0)
ZEND_END_ARG_INFO()

PHP_FUNCTION(IntSubtract){
    zend_long minuend;
    zend_long subtrahend;

    ZEND_PARSE_PARAMETERS_START(2, 2)
        Z_PARAM_LONG(minuend)
        Z_PARAM_LONG(subtrahend)
    ZEND_PARSE_PARAMETERS_END();

    RETURN_LONG(minuend - subtrahend);
}

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(integer_math_multiply_arg_info, 0, 1, IS_LONG, 0)
    ZEND_ARG_TYPE_INFO(0, multiplicand, IS_LONG, 0)
    ZEND_ARG_TYPE_INFO(0, multiplier, IS_LONG, 0)
ZEND_END_ARG_INFO()

PHP_FUNCTION(IntMultiply){
    zend_long multiplicand;
    zend_long multiplier;

    ZEND_PARSE_PARAMETERS_START(2, 2)
        Z_PARAM_LONG(multiplicand)
        Z_PARAM_LONG(multiplier)
    ZEND_PARSE_PARAMETERS_END();

    RETURN_LONG(multiplicand * multiplier);
}

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(integer_math_divide_arg_info, 0, 1, IS_LONG, 1)
    ZEND_ARG_TYPE_INFO(0, dividend, IS_LONG, 0)
    ZEND_ARG_TYPE_INFO(0, divisor, IS_LONG, 0)
ZEND_END_ARG_INFO()

PHP_FUNCTION(IntDivide){
    zend_long dividend;
    zend_long divisor;

    ZEND_PARSE_PARAMETERS_START(2, 2)
        Z_PARAM_LONG(dividend)
        Z_PARAM_LONG(divisor)
    ZEND_PARSE_PARAMETERS_END();

    if(divisor == 0){
        RETURN_NULL();
    }

    if(dividend == ZEND_LONG_MIN && divisor == -1){
        RETURN_LONG(ZEND_LONG_MIN);
    }

    RETURN_LONG(dividend / divisor);
};
//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(integer_math_remainder_arg_info, 0, 1, IS_LONG, 1)
    ZEND_ARG_TYPE_INFO(0, dividend, IS_LONG, 0)
    ZEND_ARG_TYPE_INFO(0, divisor, IS_LONG, 0)
ZEND_END_ARG_INFO()

PHP_FUNCTION(IntRemainder){
    zend_long dividend;
    zend_long divisor;

    ZEND_PARSE_PARAMETERS_START(2, 2)
        Z_PARAM_LONG(dividend)
        Z_PARAM_LONG(divisor)
    ZEND_PARSE_PARAMETERS_END();

    if(divisor == 0){
        RETURN_NULL();
    }

    if(dividend == ZEND_LONG_MIN && divisor == -1){
        RETURN_LONG(0);
    }

    RETURN_LONG(dividend % divisor);
}

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

PHP_RINIT_FUNCTION(integer_math){
    #if defined(COMPILE_DL_INTEGER_MATH) && defined(ZTS)
        ZEND_TSRMLS_CACHE_UPDATE();
    #endif
    return SUCCESS;
}

PHP_MINFO_FUNCTION(integer_math){
    php_info_print_table_start();
    php_info_print_table_header(2, "Integer Math", "enabled");
    php_info_print_table_end();
}

const zend_function_entry integer_math_functions[] = {
    ZEND_NS_FE("Netmosfera\\IntegerMath", IntAdd, integer_math_add_arg_info)
    ZEND_NS_FE("Netmosfera\\IntegerMath", IntSubtract, integer_math_subtract_arg_info)
    ZEND_NS_FE("Netmosfera\\IntegerMath", IntMultiply, integer_math_multiply_arg_info)
    ZEND_NS_FE("Netmosfera\\IntegerMath", IntDivide, integer_math_divide_arg_info)
    ZEND_NS_FE("Netmosfera\\IntegerMath", IntRemainder, integer_math_remainder_arg_info)
    PHP_FE_END
};

zend_module_entry integer_math_module_entry = {
    STANDARD_MODULE_HEADER,
    PHP_INTEGER_MATH_EXTNAME,
    integer_math_functions,
    NULL,
    NULL,
    PHP_RINIT(integer_math),
    NULL,
    PHP_MINFO(integer_math),
    PHP_INTEGER_MATH_VERSION,
    STANDARD_MODULE_PROPERTIES
};

#ifdef COMPILE_DL_INTEGER_MATH
    #ifdef ZTS
        ZEND_TSRMLS_CACHE_DEFINE();
    #endif
    ZEND_GET_MODULE(integer_math)
#endif
