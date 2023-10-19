<?php

namespace App\Interfaces;

use App\DTO\ShipmentDTO;

interface DeliveryServiceInterface
{
    /**
     * @param ShipmentDTO $shipment
     *
     * @return string
     */
    public function getDeliveryData(ShipmentDTO $shipment): string;

    public function calculatePrice(ShipmentDTO $shipment): float;
}