<?php

declare(strict_types=1);

namespace HelpScout\Api\Customers\Entry;

use HelpScout\Api\Entity\Extractable;
use HelpScout\Api\Entity\Hydratable;

class Address implements Extractable, Hydratable
{
    /**
     * @var string|null
     */
    private $city;

    /**
     * @var string[]
     */
    private $lines = [];

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var string|null
     */
    private $postalCode;

    /**
     * @var string|null
     */
    private $country;

    public function hydrate(array $data, array $embedded = [])
    {
        $this->setCity($data['city'] ?? null);
        $this->setLines($data['lines'] ?? []);
        $this->setState($data['state'] ?? null);
        $this->setPostalCode($data['postalCode'] ?? null);
        $this->setCountry($data['country'] ?? null);
    }

    /**
     * {@inheritdoc}
     */
    public function extract(): array
    {
        return [
            'city' => $this->getCity(),
            'lines' => $this->getLines(),
            'state' => $this->getState(),
            'postalCode' => $this->getPostalCode(),
            'country' => $this->getCountry(),
        ];
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity($city): Address
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    public function setLines(array $lines): Address
    {
        $this->lines = $lines;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState($state): Address
    {
        $this->state = $state;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     */
    public function setPostalCode($postalCode): Address
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry($country): Address
    {
        $this->country = $country;

        return $this;
    }
}
