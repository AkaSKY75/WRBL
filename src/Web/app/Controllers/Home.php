<?php

namespace App\Controllers; 
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    static protected $idx;
    public function index()
    {
        //$pacienti = new \App\Models\Pacient();
        //protected $allowedFields = ['parola', 'nume', 'prenume', 'cnp', 'localitate', 'judet', 'strada', 'bloc', 'scara', 'etaj', 'apartament', 'numar', 'telefon', 'email'];
        if(!isset($idx))
        {
            $idx = 0;
        }
        else
        {
            $idx = $idx + 1;
        }
        $pacienti = model('Administrator', false);
        $data = [
            'id' => $idx,
            'parola' => hash('SHA256', '12345'),
            'nume'    => 'nume'.$idx,
            'prenume' => 'prenume'.$idx,
            'cnp' => 'cnp'.$idx,
            'localitate' => 'localitate'.$idx,
            'judet' => 'judet'.$idx,
            'strada' => 'strada'.$idx,
            'bloc' => 'bloc'.$idx,
            'scara' => 'scara'.$idx,
            'etaj' => $idx,
            'apartament' => $idx,
            'numar' => "{$idx}",
            'telefon' => '0754321753',
            'email' => 'test'.$idx.'@test'.$idx.'.com'
        ];
                
        $observatie = [
            "resourceType" => "Observation",
            "id" => "1",
            "text" => [
                "status" => "generated",
                "div" => ""
            ],
            "identifier" => [
                "use" => "official",
                "system" => "http://www.bmc.nl/zorgportal/identifiers/observations",
                "value" => "6323"
            ],
            "status" => "final",
            "code" => [
              "coding" => [
                "system" => "http://loinc.org",
                "code" => "8867-4",
                "display" => "Heart rate"
              ]
            ],
            "subject" => [
                "reference" => "Patient/1820726412361",
                "display" => "Ionescu Popescu"
            ],
            "effectiveDateTime" => "2023-05-17T09:30:10+01:00",
              "issued" => "2023-05-17T15:30:10+01:00",
              "performer" => [
                "reference" => "Practitioner/1730730419891",
                "display" => "Georgescu Popescu"
              ],
              "valueQuantity" => [
                "value" => 107,
                "unit" => "Beats / minute",
                "system" => "http://unitsofmeasure.org",
                "code" => "{Beats}/min"
              ],
              "interpretation" => [
                "coding" => [
                  "system" => "http://terminology.hl7.org/CodeSystem/v3-ObservationInterpretation",
                  "code" => "H",
                  "display" => "High"
                ]
              ],
              "referenceRange" => [
                "low" => [
                  "value" => 60,
                  "unit" => "Beats / minute",
                  "system" => "http://unitsofmeasure.org",
                  "code" => "{Beats}/min"
                ],
                "high" => [
                  "value" => 100,
                  "unit" => "Beats / minute",
                  "system" => "http://unitsofmeasure.org",
                  "code" => "{Beats}/min"
                ]
              ]
            ];

        // Inserts data and returns inserted row's primary key
        //$pacienti->insert($data);
        if($this->request->getMethod(TRUE) == "POST") {
            return view('welcome_message');
        }
        else if($this->request->getMethod((TRUE) == "GET")) {
            return $this->response
                        ->setStatusCode(ResponseInterface::HTTP_OK)
                        /*->setJSON([
                            "status" => "success",
                            "data" => "",
                            "message" => "trimiterea a fost salvata"
                        ]);*/
                        ->setJSON($observatie);
                                  
        }
    }
}
