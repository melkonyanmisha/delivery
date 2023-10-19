<?php

use App\Bootstrap\DeliveryData;
use App\Controllers\FastDeliveryServiceController;
use App\Controllers\SlowDeliveryServiceController;
use App\DTO\ShipmentDTO;

/**
 * @param string $sourceKladr
 * @param string $targetKladr
 * @param float $weight
 * @param string $date
 *
 * @return string
 */
function getDeliveriesData(
    string $sourceKladr,
    string $targetKladr,
    float $weight,
    string $date
): string {
    $deliveryData        = new DeliveryData();
    $fastDeliveryService = new FastDeliveryServiceController('fast_delivery_base_url');
    $slowDeliveryService = new SlowDeliveryServiceController('slow_delivery_base_url');

    // Define shipments using ShipmentDTO
    $shipment = new ShipmentDTO($sourceKladr, $targetKladr, $weight, $date);

    $fastDeliveryData = $deliveryData->getData($shipment, $fastDeliveryService);
    $slowDeliveryData = $deliveryData->getData($shipment, $slowDeliveryService);

    return json_encode([
        'fast_delivery' => [
            'price' => $fastDeliveryData['price'],
            'date'  => $fastDeliveryData['date'],
            'error' => $fastDeliveryData['error'],
        ],
        'slow_delivery' => [
            'price' => $slowDeliveryData['price'],
            'date'  => $slowDeliveryData['date'],
            'error' => $slowDeliveryData['error'],
        ],
    ]);
}