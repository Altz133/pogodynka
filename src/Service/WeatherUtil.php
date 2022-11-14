<?php
namespace App\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MeasurementRepository;
use App\Repository\LocationRepository;
use App\Entity\Location;

class WeatherUtil {

    private MeasurementRepository $measuresRepository;
    private LocationRepository $locationRepository;

    public function __construct(MeasurementRepository $measurementRepository, LocationRepository $locationRepository)
    {
        $this->measurementRepository = $measurementRepository;
        $this->locationRepository = $locationRepository;
    }
    public function getWeatherForCountryAndCity($country, $city): array
    {
        $location = $this->locationRepository->findOneBy([
            "city" =>  $city,
            "country" => $country,
        ]);
        $measurement = $this->getWeatherForLocation($location);
        return $measurement;
    }
   
    public function getWeatherForLocation(Location $location)
    {
        $measurement = $this->measurementRepository->findByLocation($location);
        return $measurement;
    }
    public function getForecastForLocation($locationId): array{
        $location = $this->locationRepository->find($locationId);

        $measurements=$this->measurementRepository->findByLocation($location);
        $result = [
            'City'=>$location->getCity(),
            'country'=>$location->getCountry(),
            'measurement'=> [],
        ];
       
            foreach($measurements as $measurement)
            {
                
                $resultMeasurement = [
                    'date' => $measurement->getDate()->format('Y-m-d'),
                    'celsius' => $measurement->getCelsius(),
                ];
                $results['measurements'][] = $resultMeasurement;
            }

            return $results;
    }
}
?>

