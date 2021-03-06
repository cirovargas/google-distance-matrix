<?php

namespace CiroVargas\GoogleDistanceMatrix\Response;

use CiroVargas\GoogleDistanceMatrix\Exception\Exception;

class Element
{
    const STATUS_OK = 'OK';
    const STATUS_NOT_FOUND = 'NOT_FOUND';
    const STATUS_ZERO_RESULTS = 'ZERO_RESULTS';

    const STATUS = [
        self::STATUS_OK,
        self::STATUS_NOT_FOUND,
        self::STATUS_ZERO_RESULTS,
    ];

    private $status;

    private $duration;

    private $distance;

    /**
     * Element constructor.
     *
     * @param $status
     * @param Duration $duration
     * @param Distance $distance
     */
    public function __construct($status, Duration $duration, Distance $distance)
    {
        if (!in_array($status, self::STATUS)) {
            throw new Exception(sprintf('Unknown status code: %s', $status));
        }

        $this->status = $status;
        $this->duration = $duration;
        $this->distance = $distance;
    }

    /**
     * @return string
     */
    public function getStatus() : string
    {
        return $this->status;
    }

    /**
     * @return Duration
     */
    public function getDuration() : Duration
    {
        return $this->duration;
    }

    /**
     * @return Distance
     */
    public function getDistance() : Distance
    {
        return $this->distance;
    }
}
