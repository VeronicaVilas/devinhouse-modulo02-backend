<?php
require_once '../Models/Database.php';

class PlaceDAO extends Database {
    public function insert(Place $place) {
        try {
            $sql = "insert into places
                        (
                            name,
                            contact,
                            opening_hours,
                            description,
                            latitude,
                            longitude
                        )
                        values
                        (
                            :name_value,
                            :contact_value,
                            :opening_hours_value,
                            :description_value,
                            :latitude_value,
                            :longitude_value
                        );
            ";

                $statement = ($this->getConnection())->prepare($sql);
                $statement->bindValue(":name_value", $place->getName());
                $statement->bindValue(":contact_value", $place->getContact());
                $statement->bindValue(":opening_hours_value", $place->getOpeningHours());
                $statement->bindValue(":description_value", $place->getDescription());
                $statement->bindValue(":latitude_value", $place->getLatitude());
                $statement->bindValue(":longitude_value", $place->getLongitude());

                $statement->execute();

                return ['success' => true];
        } catch (PDOException $error) {
            debug($error->getMessage());
            return ['success' => false];
        }
    }
}
?>