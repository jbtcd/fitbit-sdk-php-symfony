<?php declare(strict_types = 1);

namespace FitbitBundle\DataCollector;

/**
 * (c) Jonah Böther <mail@jbtcd.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use jbtcd\Fitbit\FitbitConfiguration;
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
    private FitbitConfiguration $fitbit;

    public function __construct(
        FitbitConfiguration $fitbit
    ) {
        $this->fitbit = $fitbit;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function collect(Request $request, Response $response, \Throwable $exception = null): void
    {
        $this->data['fitbitConfiguration'] = [
            'clientId' => $this->fitbit->getClientId(),
            'expiresIn' => $this->fitbit->getExpiresIn(),
            'redirectUrl' => $this->fitbit->getRedirectUrl(),
            'scopes' => $this->fitbit->getScopes(),
            'clientSecret' => $this->fitbit->getClientSecret(),
            'codeChallenge' => $this->fitbit->getCodeChallenge(),
            'codeChallengeMethod' => $this->fitbit->getCodeChallengeMethod(),
            'prompt' => $this->fitbit->getPrompt(),
            'responseType' => $this->fitbit->getResponseType(),
            'state' => $this->fitbit->getState(),
        ];
    }

    public function getName(): string
    {
        return 'fitbit';
    }

    public function getFitbitConfiguration(): array
    {
        return $this->data['fitbitConfiguration'];
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
