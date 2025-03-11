<?php


namespace app\core;


abstract class AbstractController implements controllable
{
    /**
     * @var Response
     */
    protected Response $response;

    /**
     * @var AbsractModel
     */
    protected $model;

    public function __construct()
    {
        $this->response = new Response();
    }
}