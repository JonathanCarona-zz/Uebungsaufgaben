<?php


class Request
{
    /** @var array */
    private $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function hasParameter(string $key): bool
    {
        return (isset($this->request[$key]) && $this->request[$key] !== '') ? true : false;
    }

    public function getParameter(string $key): string
    {
        return $this->request[$key];
    }

    public function receivedRequest(): bool
    {
        $errors = array_filter($this->request);
        if (!empty($errors)) {
            return true;
        }
        return false;
    }

}
