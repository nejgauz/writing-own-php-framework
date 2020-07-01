<?php


namespace App;


use MyFramework\Interfaces\MiddlewareInterface;
use MyFramework\MyExceptions\AuthorizationErrorException;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthorizationMw implements MiddlewareInterface
{
    /**
     * @var int id юзера, которому разрешен доступ к просмотру контента контроллера
     */
    protected $userId;
    /**
     * @var Session
     */
    protected $session;

    /**
     * AuthorizationMw constructor.
     * @param int $id
     * @param Session $session
     */
    public function __construct(int $id, Session $session)
    {
        $this->userId = $id;
        $this->session = $session;
    }

    /**
     * @return mixed|void
     * @throws AuthorizationErrorException
     */
    public function before(): void
    {
        if ($this->session->get('user_id') !== $this->userId ) {
            throw new AuthorizationErrorException();
        }
    }

    /**
     * @return mixed|void
     */
    public function after(): void
    {
        // TODO: Implement after() method.
    }
}