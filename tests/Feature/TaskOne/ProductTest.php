<?php

namespace Tests\Feature\TaskOne;
use Tests\Feature\BaseTest;

class ProductTest extends BaseTest
{
  

    public function test_create_products()
    {
        $product1 = [
            'name' => 'Flour',
        ];
        $this->createProduct($product1);

        $product2 = [
            'name' => 'Cucumber',
        ];
        $this->createProduct($product2);
    }
    
}
