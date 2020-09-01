<?php declare(strict_types=1);

namespace FitbitBundle\DataCollector;

/**
 * (c) Jonah Böther <mail@jbtcd.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use jbtcd\Fitbit\Fitbit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

/**
 * Class FitbitDataCollector
 *
 * @author Jonah Böther <mail@jbtcd.me>
 */
class FitbitDataCollector extends DataCollector
{
    private $fitbit;

    public function __construct(
        string $clientId,
        string $clientSecret,
        array $scopes,
        Fitbit $fitbit
    ) {
        $this->fitbit = $fitbit;

        $this->data['clientId'] = $clientId;
        $this->data['clientSecret'] = $clientSecret;
        $this->data['scopes'] = $scopes;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function collect(Request $request, Response $response, \Throwable $exception = null): void
    {
        // TODO: Fill me
    }

    public function getName(): string
    {
        return 'fitbit';
    }

    public function getData(string $key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return null;
    }

    public function getClientId(): string
    {
        return $this->getData('clientId');
    }

    public function getClientSecret(): string
    {
        return $this->getData('clientSecret');
    }

    public function getScopes(): array
    {
        return $this->getData('scopes');
    }

    public function hasApiCalls(): bool
    {
        return isset($this->data['calls']) && !empty($this->data['calls']);
    }

    public function reset(): void
    {
        $this->data = [];
    }
}
