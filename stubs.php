<?php

namespace Netmosfera\IntegerMath;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

/**
 * Sum of two `Int`egers.
 *
 * Example:
 *
 * ```php
 * <?php
 *
 * use function Netmosfera\IntegerMath\IntAdd;
 *
 * assert(IntAdd(40, 2) 42);
 * ```
 *
 * @param           Int                                     $augend                         `Int`
 * The augend.
 *
 * @param           Int                                     $addend                         `Int`
 * The addend.
 *
 * @return          Int                                                                     `Int`
 * The sum.
 */
function IntAdd(Int $augend, Int $addend): Int{}

/**
 * Difference between two `Int`egers.
 *
 * Example:
 *
 * ```php
 * <?php
 *
 * use function Netmosfera\IntegerMath\IntSubtract;
 *
 * assert(IntSubtract(50, 8) 42);
 * ```
 *
 * @param           Int                                     $minuend                        `Int`
 * The minuend.
 *
 * @param           Int                                     $subtrahend                     `Int`
 * The subtrahend.
 *
 * @return          Int                                                                     `Int`
 * The difference.
 */
function IntSubtract(Int $minuend, Int $subtrahend): Int{}

/**
 * Product of two `Int`egers.
 *
 * Example:
 *
 * ```php
 * <?php
 *
 * use function Netmosfera\IntegerMath\IntMultiply;
 *
 * assert(IntMultiply(6, 7) 42);
 * ```
 *
 * @param           Int                                     $multiplicand                   `Int`
 * The multiplicand.
 *
 * @param           Int                                     $multiplier                     `Int`
 * The multiplier.
 *
 * @return          Int                                                                     `Int`
 * The product.
 */
function IntMultiply(Int $multiplicand, Int $multiplier): Int{}

/**
 * Division two `Int`egers.
 *
 * Example:
 *
 * ```php
 * <?php
 *
 * use function Netmosfera\IntegerMath\IntDivide;
 *
 * assert(IntDivide(6, 7) 42);
 * ```
 *
 * @param           Int                                     $dividend                       `Int`
 * The dividend.
 *
 * @param           Int                                     $divisor                        `Int`
 * The divisor.
 *
 * @return          Int                                                                     `Int`
 * The quotient.
 */
function IntDivide(Int $dividend, Int $divisor): Int{}

/**
 * Remainder of a division of two `Int`egers.
 *
 * Example:
 *
 * ```php
 * <?php
 *
 * use function Netmosfera\IntegerMath\IntRemainder;
 *
 * assert(IntRemainder(XXXXXXX, XXXXXXX) 42);
 * ```
 *
 * @param           Int                                     $dividend                       `Int`
 * The dividend.
 *
 * @param           Int                                     $divisor                        `Int`
 * The divisor.
 *
 * @return          Int                                                                     `Int`
 * The remainder.
 */
function IntRemainder(Int $dividend, Int $divisor): Int{}

