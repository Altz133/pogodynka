<?php

namespace App\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Location;
use App\Repository\MeasurementRepository;

class WeatherUtil {
    public function getWeatherForCountryAndCity(Location $getCountry, Location $getCity)
    {
        $CountryCode = $getCountry->findByLocation($getCity);
        $City =  $getCity->findByLocation($getCountry);

    }
    public function getWeatherForLocation(Location $city)
    {

        return $this->render('weather/city.html.twig', [
        'location' => $city,
        'measurements' => $measurements,
        'filtered' =>$pressure
        ]);
    }
}

?>

