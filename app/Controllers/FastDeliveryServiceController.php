<?php

namespace App\Controllers;

use App\Interfaces\DeliveryServiceInterface;
use App\DTO\ShipmentDTO;
use DateTime;
use Exception;

class FastDeliveryServiceController implements DeliveryServiceInterface
{
    private string $baseURL;

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
            if ( ! $this->checkIsAcceptableDate($shipment->getDate())) {
                throw new Exception('Not Acceptable request date for Fast delivery');
            }

            $price = $this->calculatePrice($shipment);

            // TODO for those who will check
            // Didn't handle the  'period' because of a misunderstanding. How should this be implemented and why the same thing is not in slow delivery

            $result = [
                'base_url' => $this->baseURL,
                'price'    => $price,
                'date'     => $shipment->getDate(),
                'error'    => '',
            ];
        } catch (\Exception|\Error $e) {
            // Handle the exception by setting an error message
            $result = [
                'base_url' => $this->baseURL,
                'price'    => 0,
                'date'     => '',
                'error'    => $e->getMessage(),
            ];
        }

        return json_encode($result);
    }

    /**
     * @return bool
     */
    private function checkIsAcceptableDate(): bool
    {
        $currentDateTime = new DateTime();

        if ($currentDateTime->format('H:i:s') >= '18:00:00') {
            return false;
        }

        return true;
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

        return $weight * $_ENV['FAST_DELIVERY_PRICE_PER_KG'];
    }
}