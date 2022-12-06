<?php

namespace Controllers;

use Crossjoin\Browscap\Browscap;
use Models\Brokers\UserBroker;
use Zephyrus\Application\Flash;
use Zephyrus\Application\Rule;
use Zephyrus\Application\Session;
use Zephyrus\Network\Response;
use Zephyrus\Security\Cryptography;

class LoginController extends Controller
{

    public function initializeRoutes()
    {
        $this->get("/api/v1/login","index");
        $this->get("/api/v1/user/{id}","getUser");
        $this->post("/api/v1/login","authentify");
        $this->post("/api/v1/data","getData");
    }

    public function authentify(): Response {
        $broker = new UserBroker();
        $form = $this->buildForm();
//        $form->field('email')->validate(Rule::notEmpty('veillez remplir les champs'));
//        $form->field('password')->validate(Rule::notEmpty('veillez remplir les champs'));
//        if(!$form->verify()) {
//            return $this->json([
//                "validForm"=>false
//            ]);
//        }
        if (Cryptography::verifyHashedPassword($form->getValue('password'), $broker->findUser($form->buildObject())->password)) {
            return $this->json([
                "user" => "true"
            ]);
        }else{
            return $this->json([
                "user" => "false"
            ]);
        }
    }

    public function getData() {
         $broker = new UserBroker();
         $form = $this->buildForm();
         $broker->insertData($form->buildObject());
    }


    public function index()
    {
        $broken = new UserBroker();
        $array = array();
        foreach ($broken->getAllUsername() as $test){

            $array[] = $test;
        }
        return $this->json([
         "user" => $array
      ]);
    }

    public function getUser($id)
    {
        $broker = new UserBroker();
        $user =$broker->findById($id)  ;
        return $this->json([
            $user
        ]);
    }
}
