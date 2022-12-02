<?php namespace Models\Lists;

use stdClass;
use Zephyrus\Database\Brokers\ListBroker;

class SampleProductList extends ListBroker
{
    protected function configure()
    {
        $this->setSearchableColumns(["name", "brand", "provider"]);
        $this->setSortAllowedColumns(['name', 'created_at', 'brand', 'provider', 'price']);
        $this->setSortDefaults(['name' => 'asc']);
    }

    public function findRows(): array
    {
        return $this->filteredSelect("SELECT * FROM product");
    }

    public function count(): stdClass
    {
        return $this->countQuery("SELECT count(*) as n FROM product");
    }
}
