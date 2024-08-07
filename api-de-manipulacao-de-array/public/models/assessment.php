<?php
    class Review {
        private $id, $place_id, $name, $email, $stars, $date, $status;

        public function _construct($place_id = null) {
            $this->id = uniqid();
            $this->place_id = $place_id;
            $this->date = (new DateTime())->format('d/m/Y h:i');
            $this->status = 'PENDENTE';
        }

        public function save() {
            $data = [
                'id' => $this->getId(),
                'place_id' => $this->getPlaceId(),
                'name' => $this->getName(),
                'email' => $this->getEmail(),
                'stars' => $this->getStars(),
                'status' => $this->getStatus(),
                'date' => $this->getDate()
            ];

            $allData = readFileContent('../src/data/assessments.txt');
            array_push($allData, $data);
            saveFileContent('assessments.php', $allData);
        }

        public function getId()
        {
                return $this->id;
        }

        public function getPlaceId()
        {
                return $this->place_id;
        }
        
        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getStars()
        {
                return $this->stars;
        }

        public function setStars($stars)
        {
                $this->stars = $stars;

                return $this;
        }
        
        public function getDate()
        {
                return $this->date;
        }

        public function getStatus()
        {
                return $this->status;
        }

        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }
    }
?>