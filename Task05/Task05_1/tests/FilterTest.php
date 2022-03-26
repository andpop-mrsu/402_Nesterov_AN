<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Product;
use App\ProductCollection;
use App\ManufacturerFilter;
use App\MaxPriceFilter;

class FilterTest extends TestCase
{
    public function testFilter()
    {
        $p1 = new Product();
        $p1->name = 'Шоколад';
        $p1->listPrice = 100;
        $p1->sellingPrice = 50;
        $p1->manufacturer = 'Красный Октябрь';

        $p2 = new Product();
        $p2->name = 'Мармелад';
        $p2->listPrice = 100;
        $p2->manufacturer = 'Ламзурь';


        $collection = new ProductCollection([$p1, $p2]);
        $resultCollection = $collection->filter(new ManufacturerFilter('Ламзурь'));
        $this -> assertSame(1, count($resultCollection -> getProductsArray()));
        $resultCollection = $collection->filter(new MaxPriceFilter(50));
        $this -> assertSame(1, count($resultCollection -> getProductsArray()));
    }
}
