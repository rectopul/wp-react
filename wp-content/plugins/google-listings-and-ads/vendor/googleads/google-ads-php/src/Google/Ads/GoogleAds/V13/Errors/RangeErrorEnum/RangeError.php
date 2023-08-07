<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/errors/range_error.proto

namespace Google\Ads\GoogleAds\V13\Errors\RangeErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible range errors.
 *
 * Protobuf type <code>google.ads.googleads.v13.errors.RangeErrorEnum.RangeError</code>
 */
class RangeError
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Too low.
     *
     * Generated from protobuf enum <code>TOO_LOW = 2;</code>
     */
    const TOO_LOW = 2;
    /**
     * Too high.
     *
     * Generated from protobuf enum <code>TOO_HIGH = 3;</code>
     */
    const TOO_HIGH = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::TOO_LOW => 'TOO_LOW',
        self::TOO_HIGH => 'TOO_HIGH',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RangeError::class, \Google\Ads\GoogleAds\V13\Errors\RangeErrorEnum_RangeError::class);

