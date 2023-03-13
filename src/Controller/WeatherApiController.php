<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherApiController extends AbstractController
{
    #[Route('/weather/api', name: 'app_weather_api')]
    public function cityAction(Response $response, WeatherUtil $weatherService): Response
    {
        // $measurements = $weatherService->getWeatherForCountryAndCity();
        // $response = new Response([
        //     ''
        // ]
            
        // )
        // // $response->headers->set('ContentType','application/json');
        // // return $this->render('weather_api/index.html.twig', [
        // //     'measurements' => $measurements,
        // // ]);
    }
}
