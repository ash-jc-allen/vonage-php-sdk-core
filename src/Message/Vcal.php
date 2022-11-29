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
 * SMS Text Message
 */
class Vcal extends Message
{
    public const TYPE = 'vcal';

    /**
     * Create a new SMS text message.
     */
    public function __construct(string $to, string $from, /**
     * Message Body
     */
    protected string $vcal)
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
        return array_merge(parent::getRequestData($sent), ['vcal' => $this->vcal]);
    }
}
