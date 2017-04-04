<?php
namespace App\Interfaces;

interface IFormatter {
    public function setLineItems(array $items);
    public function getFormattedLineItem(int $index);
    public function getFormattedLineItemAll();
    public function addLineItem($item);
    public function getFormattedLineItemCount();
} 
