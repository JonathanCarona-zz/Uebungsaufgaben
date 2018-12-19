<?php


class Request
{
    /** @var array */
    private $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function hasRequest(string $key): bool
    {
        if (isset($this->request[$key]) && $this->request[$key] !== '') {
            return true;
        }
        return false;
    }

    public function getRequest(string $key): string
    {
        return $this->request[$key];
    }

    public function getArrayRequest(): array
    {
        return $this->request;
    }
}
