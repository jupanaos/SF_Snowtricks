<?php

declare(strict_types=1);

namespace App\Services;

use Symfony\Component\HttpFoundation\Session\Session;

class AlertService implements AlertServiceInterface
{
    public const ALERT_SUCCESS = 'success';

    public const ALERT_ERROR = 'error';

    public const ALERT_WARNING = 'warning';

    public const ALERT_INFO = 'info';

    private Session $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    /**
     * {@inheritDoc}
     */
    public function success(string $message): void
    {
        $this->session->getFlashBag()->add(self::ALERT_SUCCESS, $message);
    }

    /**
     * {@inheritDoc}
     */
    public function error(string $message): void
    {
        $this->session->getFlashBag()->add(self::ALERT_ERROR, $message);
    }

    /**
     * {@inheritDoc}
     */
    public function warning(string $message): void
    {
        $this->session->getFlashBag()->add(self::ALERT_WARNING, $message);
    }

    /**
     * {@inheritDoc}
     */
    public function info(string $message): void
    {
        $this->session->getFlashBag()->add(self::ALERT_INFO, $message);
    }
}
