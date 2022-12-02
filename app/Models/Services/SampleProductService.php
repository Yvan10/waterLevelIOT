<?php namespace Models\Services;

use Models\Brokers\SampleProductBroker;
use Models\Lists\SampleProductList;
use Models\Validators\SampleProductValidator;
use stdClass;
use Zephyrus\Application\Form;
use Zephyrus\Utilities\Components\ListView;

class SampleProductService
{
    public static function buildListView(): ListView
    {
        $list = (new SampleProductList())->inflate();
        $list->addHeader("Nom", "name");
        $list->addHeader("Fournisseur", "provider");
        $list->addHeader("Prix", "price", "right");
        return $list;
    }

    public static function read(int $productId): ?stdClass
    {
        return (new SampleProductBroker())->findById($productId);
    }

    public static function insert(Form $form): stdClass
    {
        SampleProductValidator::assert($form);
        $broker = new SampleProductBroker();
        $productId = $broker->insert($form->buildObject());
        return $broker->findById($productId);
    }

    public static function update(int $productId, Form $form): stdClass
    {
        SampleProductValidator::assert($form);
        $broker = new SampleProductBroker();
        $broker->update($productId, $form->buildObject());
        return $broker->findById($productId);
    }

    public static function remove(int $productId)
    {
        (new SampleProductBroker())->delete($productId);
    }

    public static function removeAll(array $productIds)
    {
        (new SampleProductBroker())->deleteAll($productIds);
    }
}
