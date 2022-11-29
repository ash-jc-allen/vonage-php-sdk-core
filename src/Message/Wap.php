<?php

/**
 * Vonage Client Library for PHP
 *
 * @copyright Copyright (c) 2016-2022 Vonage, Inc. (http://vonage.com)
 * @license https://github.com/Vonage/vonage-php-sdk-core/blob/master/LICENSE.txt Apache License 2.0
 */

declare(strict_types=1);

namespace Vonage\Message;

use Vonage\Client\Exception\Exception as ClientException;

use function array_merge;

/**
 * SMS Binary Message
 */
class Wap extends Message
{
    public const TYPE = 'wappush';

    /**
     * Create a new SMS text message.
     */
    public function __construct(string $to, string $from, /**
     * Message Title
     */
    protected string $title, /**
     * Message URL
     */
    protected string $url, /**
     * Message Timeout
     */
    protected int $validity)
    {
        parent::__construct($to, $from);
    }

    /**
     * Get an array of params to use in an API request.
     *
     * @throws ClientException
     */
    public function getRequestData(bool $sent = true): array
    {
        return array_merge(parent::getRequestData($sent), [
            'title' => $this->title,
            'url' => $this->url,
            'validity' => $this->validity,
        ]);
    }
}
