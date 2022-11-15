<?php
    class Database {
        // DB Parameters
        private $host = 'localhost';
        private $db_name = 'myblog';
        private $username = 'root';
        private $password = '123456';
        private $conn;
        

        // DB Connection
        public function connect() {
            $this -> conn = null;

            // Create new PDO using try / catch
            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection Error ' .  $e->getMessage();
            }

            return $this->conn;
        }
    }

?>