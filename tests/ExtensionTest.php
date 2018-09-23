<?php declare(strict_types = 1); // atom

namespace Netmosfera\IntegerMathTests;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use function intdiv;
use function Netmosfera\IntegerMath\IntAdd;
use function Netmosfera\IntegerMath\IntDivide;
use function Netmosfera\IntegerMath\IntMultiply;
use function Netmosfera\IntegerMath\IntRemainder;
use function Netmosfera\IntegerMath\IntSubtract;
use PHPUnit\Framework\TestCase;
use const PHP_INT_MIN;
use const PHP_INT_MAX;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

class ExtensionTest extends TestCase
{
    function test_add(){
        foreach(range(-420, 420) as $augend){
            foreach(range(-420, 420) as $addend){
                self::assertSame(
                    $augend + $addend,
                    IntAdd($augend, $addend),
                    $augend . " + " . $addend
                );
            }
        }
        self::assertSame(PHP_INT_MAX, IntAdd(PHP_INT_MIN, -1));
        self::assertSame(PHP_INT_MIN, IntAdd(PHP_INT_MAX, +1));
    }

    function test_subtract(){
        foreach(range(-420, 420) as $minuend){
            foreach(range(-420, 420) as $subtrahend){
                self::assertSame(
                    $minuend - $subtrahend,
                    IntSubtract($minuend, $subtrahend),
                    $minuend . " - " . $subtrahend
                );
            }
        }
        self::assertSame(PHP_INT_MIN, IntSubtract(PHP_INT_MAX, -1));
        self::assertSame(PHP_INT_MAX, IntSubtract(PHP_INT_MIN, +1));
    }

    function test_multiply(){
        foreach(range(-420, 420) as $multiplicand){
            foreach(range(-420, 420) as $multiplier){
                self::assertSame(
                    $multiplicand * $multiplier,
                    IntMultiply($multiplicand, $multiplier),
                    $multiplicand . " * " . $multiplier
                );
            }
        }
        self::assertSame( 9223372036854775766, IntMultiply( 4611686018427387903,  42));
        self::assertSame(-9223372036854775766, IntMultiply( 4611686018427387903, -42));
        self::assertSame(-9223372036854775766, IntMultiply(-4611686018427387903,  42));
        self::assertSame( 9223372036854775766, IntMultiply(-4611686018427387903, -42));
    }

    function test_divide(){
        foreach(range(-420, 420) as $dividend){
            foreach(range(-420, 420) as $divisor){
                self::assertSame(
                    $divisor === 0 ? NULL : intdiv($dividend, $divisor),
                    IntDivide($dividend, $divisor),
                    $dividend . " / " . $divisor
                );
            }
        }

        self::assertSame(       NULL,     IntDivide(0, 0));

        self::assertSame(PHP_INT_MAX,     IntDivide(PHP_INT_MIN + 1, -1));

        self::assertSame(PHP_INT_MIN,     IntDivide(PHP_INT_MIN, -1));
        self::assertSame(PHP_INT_MIN,     IntDivide(PHP_INT_MIN, 1));
        self::assertSame(          1,     IntDivide(PHP_INT_MIN, PHP_INT_MIN));
        self::assertSame(         -1,     IntDivide(PHP_INT_MIN, PHP_INT_MAX));
        self::assertSame(       NULL,     IntDivide(PHP_INT_MIN, 0));

        self::assertSame(PHP_INT_MIN + 1, IntDivide(PHP_INT_MAX, -1));
        self::assertSame(PHP_INT_MAX,     IntDivide(PHP_INT_MAX, 1));
        self::assertSame(          0,     IntDivide(PHP_INT_MAX, PHP_INT_MIN));
        self::assertSame(          1,     IntDivide(PHP_INT_MAX, PHP_INT_MAX));
        self::assertSame(       NULL,     IntDivide(PHP_INT_MAX, 0));
    }

    function test_remainder(){
        foreach(range(-420, 420) as $dividend){
            foreach(range(-420, 420) as $divisor){
                self::assertSame(
                    $divisor === 0 ? NULL : $dividend % $divisor,
                    IntRemainder($dividend, $divisor),
                    $dividend . " % " . $divisor
                );
            }
        }

        self::assertSame(       NULL,     IntRemainder(0, 0));

        self::assertSame(          0,     IntRemainder(PHP_INT_MIN + 1, -1));

        self::assertSame(          0,     IntRemainder(PHP_INT_MIN, -1));
        self::assertSame(          0,     IntRemainder(PHP_INT_MIN, 1));
        self::assertSame(          0,     IntRemainder(PHP_INT_MIN, PHP_INT_MIN));
        self::assertSame(         -1,     IntRemainder(PHP_INT_MIN, PHP_INT_MAX));
        self::assertSame(       NULL,     IntRemainder(PHP_INT_MIN, 0));

        self::assertSame(          0,     IntRemainder(PHP_INT_MAX, -1));
        self::assertSame(          0,     IntRemainder(PHP_INT_MAX, 1));
        self::assertSame(PHP_INT_MAX,     IntRemainder(PHP_INT_MAX, PHP_INT_MIN));
        self::assertSame(          0,     IntRemainder(PHP_INT_MAX, PHP_INT_MAX));
        self::assertSame(       NULL,     IntRemainder(PHP_INT_MAX, 0));
    }
}
