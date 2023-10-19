<?php

namespace App\DTO;

class ShipmentDTO
{
    private string $sourceKladr;
    private string $targetKladr;
    private float $weight;
    private string $date;

    /**
     * @param string $sourceKladr
     * @param string $targetKladr
     * @param float $weight
     * @param string $date
     */
    public function __construct(
        string $sourceKladr,
        string $targetKladr,
        float $weight,
        string $date
    ) {
        $this->sourceKladr = $sourceKladr;
        $this->targetKladr = $targetKladr;
        $this->weight      = $weight;
        $this->date        = $date;
    }

    /**
     * @return string
     */
    public function getSourceKladr(): string
    {
        return $this->sourceKladr;
    }

    /**
     * @return string
     */
    public function getTargetKladr(): string
    {
        return $this->targetKladr;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
}
