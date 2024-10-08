<?php
require_once '../config.php';

class Place {
    public $id;
    private $name;
    private $contact;
    private $opening_hours;
    private $description;
    private $latitude;
    private $longitude;

    public function __construct($name) 
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    public function getOpeningHours()
    {
        return $this->opening_hours;
    }

    public function setOpeningHours($opening_hours)
    {
        $this->opening_hours = $opening_hours;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
}

?>