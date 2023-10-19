<?php

namespace App\Bootstrap;

use App\DTO\ShipmentDTO;
use App\Interfaces\DeliveryServiceInterface;

class DeliveryData
{
    /**
     * @param ShipmentDTO $shipment
     * @param DeliveryServiceInterface $selectedService
     *
     * @return array
     */
    public function getData(ShipmentDTO $shipment, DeliveryServiceInterface $selectedService): array
    {
        return json_decode($selectedService->getDeliveryData($shipment), true);
    }
}