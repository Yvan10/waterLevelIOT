<?php

namespace Models\Validators;

use Models\Exceptions\FormException;
use stdClass;
use Zephyrus\Application\Form;
use Zephyrus\Application\Rule;

class UserValidator
{
    public static function assert(Form $form)
    {
        $form->field("username")
            ->validate(Rule::notEmpty(localize("errors.required")))
            ->validate(Rule::minLength(7, localize("errors.student.username")))
            ->validate(Rule::maxLength(7, localize("errors.student.username")))
            ->validate(Rule::integer(localize("errors.integer")));
        $form->field("firstname")
            ->validate(Rule::notEmpty(localize("errors.required")))
            ->validate(Rule::name(localize("errors.name")))
            ->validate(Rule::maxLength(255, localize("errors.field_too_long")));
        $form->field("lastname")
            ->validate(Rule::notEmpty(localize("errors.required")))
            ->validate(Rule::name(localize("errors.name")))
            ->validate(Rule::maxLength(255, localize("errors.field_too_long")));

       return $form->verify();
    }
}