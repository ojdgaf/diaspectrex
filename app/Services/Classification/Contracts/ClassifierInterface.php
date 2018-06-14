<?php

namespace App\Services\Classification\Contracts;

use App\Models\Prediction;
use App\Models\Test;

interface ClassifierInterface
{
    public function classify(Test $test): Prediction;

    public function retrain(): ClassifierInterface;
}