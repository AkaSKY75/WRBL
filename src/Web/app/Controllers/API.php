<?php

namespace App\Controllers; 
use CodeIgniter\HTTP\ResponseInterface;

class API extends BaseController
{
    public $error_json;
    private const APP_ID = 'YzfeftUVcZ6twZw1OoVKPRFYTrGEg01Q';
    private const APP_SECRET = '4G91qSoboqYO4Y0XJ0LPPKIsq8reHdfa';
    public function JSONValidation()
    {
        $this->error_json = null;
        if($this->request->header('Content-Type') == null) {
            $this->error_json = [
                "status" => "failure",
                "data" => "",
                "message" => "Required 'Content-Type' header is missing"
            ];
            return null;
        }
        if($this->request->header('Content-Type')->getValue() != 'application/json')
        {
            $this->error_json = [
                "status" => "failure",
                "data" => "",
                "message" => "Required 'Content-Type' header's value is not 'application/json'"
            ];
            return null;
        }
        $json = json_decode($this->request->getBody());
        $message = '';
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                $message = ' - No errors';
            break;
            case JSON_ERROR_DEPTH:
                $message = ' - Maximum stack depth exceeded';
            break;
            case JSON_ERROR_STATE_MISMATCH:
                $message = ' - Underflow or the modes mismatch';
            break;
            case JSON_ERROR_CTRL_CHAR:
                $message = ' - Unexpected control character found';
            break;
            case JSON_ERROR_SYNTAX:
                $message = ' - Syntax error, malformed JSON';
            break;
            case JSON_ERROR_UTF8:
                $message = ' - Malformed UTF-8 characters, possibly incorrectly encoded';
            break;
            default:
                $message = ' - Unknown error';
            break;
        }
        if($json == null) {
            $this->error_json = [
                "status" => "failure",
                "data" => var_dump(json_decode($this->request->getBody())),
                "message" => $message
            ];
        }
        return $json;
    }
    public function GetDataFromSmartphone()
    {
        $json = $this->JSONValidation();
        if ($json == null) {
          return $this->response
              ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
              ->setJSON($this->error_json);
        }
        try {
            //$hmac = array_key_first($json);
            foreach($json as $hmac => $body) break;
            $hmac_new = hash_hmac('sha256', json_encode($body), self::APP_SECRET);
            $Valori_Senzori = model('Valori_Senzori', false);
            return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_OK)
                    ->setJSON(['debug' => $hmac]);
        } catch (\Exception $e) {
            return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                    ->setJSON(['debug' => $e->getMessage()]);
        }
    }
    public function GetDataFromHL7FHIR()
    {
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
            return $this->response
                        ->setStatusCode(ResponseInterface::HTTP_OK)
                        /*->setJSON([
                        "status" => "success",
                        "data" => "",
                        "message" => "trimiterea a fost salvata"
                        ]);*/
                        ->setJSON($observatie);
      /*$data = [
        'id' => self::$idx,
        'parola' => hash('SHA256', '12345'),
        'nume'    => 'nume'.self::$idx,
        'prenume' => 'prenume'.self::$idx,
        'cnp' => 'cnp'.self::$idx,
        'localitate' => 'localitate'.self::$idx,
        'judet' => 'judet'.self::$idx,
        'strada' => 'strada'.self::$idx,
        'bloc' => 'bloc'.self::$idx,
        'scara' => 'scara'.self::$idx,
        'etaj' => self::$idx,
        'apartament' => self::$idx,
        'numar' => ''.self::$idx,
        'telefon' => '0754321753',
        'email' => 'test'.self::$idx.'@test'.self::$idx.'.com'
      ];
      $Administratori = model('Administrator', false);
      $Administratori->where('id', 0)->delete(0);
      $Administratori->insert($data);*/
    }
}
