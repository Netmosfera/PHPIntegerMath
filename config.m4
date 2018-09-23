PHP_ARG_ENABLE(integer-math, whether to enable Integer Math support,
[  --enable-integer-math    Enable Integer Math support])

if test "$PHP_INTEGER_MATH" != "no"; then
  PHP_NEW_EXTENSION(integer_math, integer_math.c, $ext_shared,, -DZEND_ENABLE_STATIC_TSRMLS_CACHE=1)
fi
