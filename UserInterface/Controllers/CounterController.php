<?php


namespace UserInterface;


use DataLibrary\ProductsProcessor;

class CounterController
{
    public static function getNumberOfTransactionsInBasket($userId)
    {
        return ProductsProcessor::getNumberOfTransactionsInBasket($userId);

    }
}