<?php declare(strict_types = 1);

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
    private Fitbit $fitbit;

    public function __construct(
        Fitbit $fitbit
    ) {
        $this->fitbit = $fitbit;
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

    public function getClientId(): string
    {
        return $this->fitbit->getClientId();
    }

    public function getClientSecret(): string
    {
        return $this->fitbit->getClientSecret();
    }

    public function getScopes(): array
    {
        return $this->fitbit->getScopes();
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
