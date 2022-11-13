<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Location;
use App\Repository\MeasurementRepository;

class WeatherController extends AbstractController
{
/**
 * @Route("/city", name="weather_in_city")
 */
    public function cityAction(Location $city, MeasurementRepository $measurementRepository): Response
    {
    $measurements = $measurementRepository->findByLocation($city);
    $pressure =  $measurementRepository->findPressureByLocation($city);
    return $this->render('weather/city.html.twig', [
    'location' => $city,
    'measurement' => $measurement,
    'filtered' =>$pressure
    ]);
    }

}


