<?php
    class Conexion{
        var $servername='localhost';
        var $username="root";
        var $password='';

        private $Database='';
        private $query='';

        public function __construct($Database='',$query=''){
            $this->Database=$Database;
            $this->query=$query;
        }
        
        public function getServername(){
            return $this->servername;
        }

        public function setServername($servername){
            $this->servername=$servername;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setUsername($username){
            $this->username=$username;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password=$password;
        }

        

        public function EstablecerConexion_r($Database='',$query=''){
            $database=$Database;
            #crear conexion
            $conn= new mysqli($this->servername,$this-> username,$this-> password,$database);
            #Verificar conexion
            if ($conn->connect_error) {
                # die - ejecuta esta ultima linea y finaliza la ejecucion del archivo   
                die('conction Failed : '.$conn->connect_error);
            }

            $sql=$query;
            $datosretunr =$conn->query($sql);
            $conn->close();
            return $datosretunr;
        }

        public function EstablecerConexion_g($Database,$query){
            $database=$Database;
            #crear conexion
            $conn= new mysqli($this->servername,$this-> username,$this-> password,$database);
            #Verificar conexion
            if ($conn->connect_error) {
                # die - ejecuta esta ultima linea y finaliza la ejecucion del archivo   
                die('conction Failed : '.$conn->connect_error);
            }

            if (mysqli_query($conn, $query)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }

            // $sql=$query;
            // $datosretunr =$conn->query($sql);
            // $conn->close();
            // return $datosretunr;
        }
    }
    

    
?>