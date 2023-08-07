<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/common/criteria.proto

namespace Google\Ads\GoogleAds\V13\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A custom intent criterion.
 * A criterion of this type is only targetable.
 *
 * Generated from protobuf message <code>google.ads.googleads.v13.common.CustomIntentInfo</code>
 */
class CustomIntentInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The CustomInterest resource name.
     *
     * Generated from protobuf field <code>optional string custom_intent = 2;</code>
     */
    protected $custom_intent = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $custom_intent
     *           The CustomInterest resource name.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V13\Common\Criteria::initOnce();
        parent::__construct($data);
    }

    /**
     * The CustomInterest resource name.
     *
     * Generated from protobuf field <code>optional string custom_intent = 2;</code>
     * @return string
     */
    public function getCustomIntent()
    {
        return isset($this->custom_intent) ? $this->custom_intent : '';
    }

    public function hasCustomIntent()
    {
        return isset($this->custom_intent);
    }

    public function clearCustomIntent()
    {
        unset($this->custom_intent);
    }

    /**
     * The CustomInterest resource name.
     *
     * Generated from protobuf field <code>optional string custom_intent = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCustomIntent($var)
    {
        GPBUtil::checkString($var, True);
        $this->custom_intent = $var;

        return $this;
    }

}

