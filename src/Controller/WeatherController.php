<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Location;
use App\Repository\MeasurementRepository;
use App\Repository\LocationRepository;
use App\Service\WeatherUtil;
class WeatherController extends AbstractController
{
    /**
     * Route("/country/city", name="weather_in_city")
     */
    public function cityAction($country, $city, WeatherUtil $weatherService): Response
    {
    $measurements = $weatherService->getWeatherForCountryAndCity($country, $city);
    return $this->render('weather/city.html.twig', [
    'measurements' => $measurements,
    // 'location' => $city,
    // 'filtered' =>$pressure
    ]);

    }

}


