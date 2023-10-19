<h1 style="text-align: center">Delivery Cost Calculator</h1>

<p>
This is a PHP project that includes a delivery cost calculator for two different delivery services, "Fast Delivery" and "Slow Delivery."
</p>

DIRECTORY STRUCTURE
-------------------

```
app/
    Bootstrap/
        DeliveryData.php - The main class for get delivery.
    Controllers/
        FastDeliveryServiceController.php - Controller for the "Fast Delivery" service.
        SlowDeliveryServiceController.php - Controller for the "Slow Delivery" service.
    DTO/
        ShipmentDTO.php - Data Transfer Object for representing shipment information.
    Interfaces/
        DeliveryServiceInterface.php - Interface defining the common methods for delivery services.
```

Before run the application you need to create .env file 

Code to run the application from CLI
```
 php index.php
```