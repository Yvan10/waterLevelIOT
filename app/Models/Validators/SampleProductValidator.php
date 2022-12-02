<?php namespace Models\Validators;

use Models\Exceptions\FormException;
use Zephyrus\Application\Form;
use Zephyrus\Application\Rule;

class SampleProductValidator
{
    public static function assert(Form $form)
    {
        $form->field("name")->validate(Rule::notEmpty("Ne doit pas être vide."));
        $form->field("brand")->validate(Rule::notEmpty("Ne doit pas être vide."));
        $form->field("provider")->validate(Rule::notEmpty("Ne doit pas être vide."));
        $form->field("price")
            ->validate(Rule::notEmpty("Ne doit pas être vide."))
            ->validate(Rule::decimal("Doit être un montant."));
        if (!$form->verify()) {
            throw new FormException($form);
        }
    }
}
