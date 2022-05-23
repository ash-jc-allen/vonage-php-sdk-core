<?php

/**
 * Vonage Client Library for PHP
 *
 * @copyright Copyright (c) 2016-2020 Vonage, Inc. (http://vonage.com)
 * @license https://github.com/Vonage/vonage-php-sdk-core/blob/master/LICENSE.txt Apache License 2.0
 */

declare(strict_types=1);

namespace Vonage\Messages;

use Vonage\Client\APIClient;
use Vonage\Client\APIResource;
use Vonage\Client\Exception\ThrottleException;
use Vonage\Messages\MessageType\BaseMessage;

class Client implements APIClient
{
    protected APIResource $api;

    public function __construct(APIResource $apiResource)
    {
        $this->api = $apiResource;
    }

    public function getAPIResource(): APIResource
    {
        return $this->api;
    }

    public function send(BaseMessage $message): ?array
    {
        try {
            return $this->api->create($message->toArray(), '/messages');
        } catch (ThrottleException $e) {
            sleep($e->getTimeout());

            return $this->send($message);
        }
    }
}