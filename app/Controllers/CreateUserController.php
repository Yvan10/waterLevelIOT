<?php

namespace Controllers;

use Models\Services\UserService;
use Zephyrus\Network\Response;

class CreateUserController extends Controller
{

    public function initializeRoutes()
    {
        $this->post("/api/v1/createUser","create");
    }


    public function create(): Response
    {
        $isValid = UserService::registerHandler($this->buildForm());
        //Flash::success(localize('success.added'));
        return $this->json([
            "status"=>$isValid
        ]);
    }


}