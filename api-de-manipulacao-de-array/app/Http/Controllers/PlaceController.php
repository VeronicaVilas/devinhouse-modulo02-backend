<?php
require_once '../utils.php';
require_once '../Models/Place.php';
require_once '../Models/PlaceDAO.php';

class PlaceController {
    public function create() {
        $body = getBody();

        $name = sanitizeString($body->name);
        $contact = sanitizeString($body->contact);
        $opening_hours = sanitizeString($body->opening_hours);
        $description = sanitizeString($body->description);
        $latitude = filter_var($body->latitude, FILTER_VALIDATE_FLOAT);
        $longitude = filter_var($body->longitude, FILTER_VALIDATE_FLOAT);

        if (!$name || !$contact || !$opening_hours || !$description || !$latitude || !$longitude) {
            responseError('Faltaram informações essenciais', 400);
        }

        $place = new Place($name);
        $place->setContact($contact);
        $place->setOpeningHours($opening_hours);
        $place->setDescription($description);
        $place->setLatitude($latitude);
        $place->setLongitude($longitude);

        $placeDAO = new PlaceDAO();
        $result = $placeDAO->insert($place);

        if ($result['success'] === true) {
            response(["message" => "Cadastrado com sucesso"], 201);
        } else {
            responseError("Não foi possível realizar o cadastro!", 400);
        }
    }

    public function list() {
        $placeDAO = new PlaceDAO();
        $result = $placeDAO->findMany();
        response($result, 200);
    }
}

?>