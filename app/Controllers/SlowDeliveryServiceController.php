<?php

namespace App\Controllers;

use App\Interfaces\DeliveryServiceInterface;
use App\DTO\ShipmentDTO;

class SlowDeliveryServiceController implements DeliveryServiceInterface
{
    private string $baseURL;
    private float $price = 150;

    /**
     * @param string $baseURL
     */
    public function __construct(string $baseURL)
    {
        $this->baseURL = $baseURL;
    }

    /**
     * @param ShipmentDTO $shipment
     *
     * @return string
     */
    public function getDeliveryData(ShipmentDTO $shipment): string
    {
        try {
            $price = $this->calculatePrice($shipment);

            $result = [
                'base_url'    => $this->baseURL,
                'price'       => $price,
                'coefficient' => $_ENV['SLOW_DELIVERY_PRICE_COEFFICIENT'],
                'date'        => $shipment->getDate(),
                'error'       => '',
            ];
        } catch (\Exception|\Error $e) {
            // Handle the exception by setting an error message
            $result = [
                'base_url'    => $this->baseURL,
                'price'       => 0,
                'coefficient' => '',
                'date'        => '',
                'error'       => $e->getMessage(),
            ];
        }

        return json_encode($result);
    }

    /**
     * Calculate the price based on the weight
     *
     * @param ShipmentDTO $shipment
     *
     * @return float
     */
    public function calculatePrice(ShipmentDTO $shipment): float
    {
        $weight = $shipment->getWeight();
        return $weight * $_ENV['FAST_DELIVERY_PRICE_PER_KG'] * $_ENV['SLOW_DELIVERY_PRICE_COEFFICIENT'];
    }

}