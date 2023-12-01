<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip\CredentialList;

use Twilio\Options;
use Twilio\Values;

abstract class CredentialOptions {
    /**
     * @param string $password The password will not be returned in the response
     * @return UpdateCredentialOptions Options builder
     */
    public static function update(string $password = Values::NONE): UpdateCredentialOptions {
        return new UpdateCredentialOptions($password);
    }
}

class UpdateCredentialOptions extends Options {
    /**
     * @param string $password The password will not be returned in the response
     */
    public function __construct(string $password = Values::NONE) {
        $this->options['password'] = $password;
    }

    /**
     * The password that the username will use when authenticating SIP requests. The password must be a minimum of 12 characters, contain at least 1 digit, and have mixed case. (eg `IWasAtSignal2018`)
     *
     * @param string $password The password will not be returned in the response
     * @return $this Fluent Builder
     */
    public function setPassword(string $password): self {
        $this->options['password'] = $password;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Api.V2010.UpdateCredentialOptions ' . $options . ']';
    }
}