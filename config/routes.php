<?php

return array (
    'cart' => 'cart/index',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/check' => 'cart/check',
    'cart/close' => 'cart/close',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/item-dec/([0-9]+)' => 'cart/itemDecrement/$1',
    'cart/item-inc/([0-9]+)' => 'cart/itemIncrease/$1',

    '' => 'home/index' 
);