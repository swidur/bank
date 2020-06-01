<?php


namespace UserInterface;


class ListWrapper
{
    protected $elements = array();
    protected $sum;

    /**
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param array $element
     */
    public function addElement($element)
    {
        array_push($this->elements, $element);
    }

    public function countElements()
    {
        return count($this->elements);
    }

}