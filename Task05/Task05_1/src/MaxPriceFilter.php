<?php

namespace App;

class MaxPriceFilter implements ProductFilteringStrategy
{
    private int $maxPrice;

    public function __construct(int $maxPrice)
    {
        $this -> maxPrice = $maxPrice;
    }

    public function filter(array $collection)
    {
        $result = array();
        $sellingPrice;
        foreach ($collection as $elem) {
            if (isset($elem -> sellingPrice)) {
                $listPrice = $elem -> listPrice * (1 - $elem -> sellingPrice / 100);
            } else {
                $listPrice = $elem -> listPrice;
            }
            if ($listPrice <= $this -> maxPrice) {
                $result[] = $elem;
            }
        }

        return $result;
    }
}
