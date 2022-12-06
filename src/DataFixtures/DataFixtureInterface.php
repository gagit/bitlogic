<?php

namespace App\DataFixtures;

interface DataFixtureInterface
{
    public function load(): void;
    public function getGroups(): array;
}