<?php namespace Models\Brokers;

use stdClass;

class SampleProductBroker extends Broker
{
    public function findById(int $productId): ?stdClass
    {
        return $this->selectSingle("SELECT * FROM product WHERE product_id = ?", [$productId]);
    }

    public function insert(stdClass $product): int
    {
        return $this->selectSingle("INSERT INTO product(provider, brand, name, price) 
                                                  VALUES (?, ?, ?, ?) RETURNING product_id", [
            $product->provider,
            $product->brand,
            $product->name,
            $product->price
        ])->product_id;
    }

    public function update(int $productId, stdClass $product)
    {
        $this->query("UPDATE product 
                               SET provider = ?, brand = ?, name = ?, price = ?,
                                   updated_at = now() 
                             WHERE product_id = ?", [
            $product->provider,
            $product->brand,
            $product->name,
            $product->price,
            $productId
        ]);
    }

    public function delete(int $productId)
    {
        $this->query("DELETE FROM product WHERE product_id = ?", [$productId]);
    }

    public function deleteAll(array $productIds)
    {
        foreach ($productIds as $productId) {
            $this->delete($productId);
        }
    }
}
