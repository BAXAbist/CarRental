<?php
    class DB_requests {

        private function createConnection () {
            $conn = new PDO('mysql:host = 178.132.201.118 ; dbname=rentnewc_db', 'rentnewc_db', '0O8k8Y8f');
            // Установить режим ошибки PDO в исключение
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }

        //Get client's info by login and password
        //$login - client's login; $password - client's password
        //return client's data(array). В массиве есть элемент 'check'. Если логин есть в дб и пароль совпадает, то в 'check' будет 'correct'.
        //Если логина нет в дб, то в 'check' будет 'wrong login'. А если логин есть, но пароль несовпадает, то в 'check' будет 'wrong password'
        public function getClientByLogin ($login,$password){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Clients WHERE login = '$login'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $client = array('check' => "wrong login");
                }
                else{
                    foreach ($log as $row) {
                        if ($row['password'] == $password){
                            $client = array('id_client' => $row['id_client'],
                                            'login' => $row['login'],
                                            'password' => $row['password'],
                                            'first_name' => $row['first_name'],
                                            'second_name' => $row['second_name'],
                                            'middle_name' => $row['middle_name'],
                                            'address' => $row['address'],
                                            'phone' => $row['phone'],
                                            'check' => "correct");
                        }
                        else{
                            $client = array('check' => "wrong password");
                        }
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $client;
        }

        public function getAllClients (){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Clients";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $cars = array('0' => "Cars list is empty");
                }
                else{
                    foreach ($log as $row) {
                        $cl_key = $row['id_car'];
                        $cars = array( $cl_key => array('id_client' => $row['id_client'],
                                                        'login' => $row['login'],
                                                        'password' => $row['password'],
                                                        'first_name' => $row['first_name'],
                                                        'second_name' => $row['second_name'],
                                                        'middle_name' => $row['middle_name'],
                                                        'address' => $row['address'],
                                                        'phone' => $row['phone']));
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $cars;
        }

        public function getCarByid ($id_car){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Car_rent WHERE id_car = '$id_car'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $car = array('check' => "unknown car");
                }
                else{
                    foreach ($log as $row) {
                        $car = array('id_car' => $row['id_car'],
                                    'brand' => $row['brand'],
                                    'cost' => $row['cost'],
                                    'type' => $row['type'],
                                    'icon' => $row['icon'],
                                    'check' => "correct");
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $car;
        }

        public function getAllCars (){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Car_rent";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $cars = array('0' => "Cars list is empty");
                }
                else{
                    foreach ($log as $row) {
                        $c_key = $row['id_car'];
                        $cars = array( $c_key => array('id_car' => $row['id_car'],
                                                        'brand' => $row['brand'],
                                                        'cost' => $row['cost'],
                                                        'type' => $row['type'],
                                                        'icon' => $row['icon']));
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $cars;
        }

        public function getClientHistory ($id_client){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM History WHERE id_client = '$id_client'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $cl_history = array('check' => "unknown history");
                }
                else{
                    foreach ($log as $row) {
                        $cl_history = array('id_history' => $row['id_history'],
                                         'id_client' => $row['id_client'],
                                         'id_car' => $row['id_car'],
                                         'date_issue' => $row['date_issue'],
                                         'date_return' => $row['date_return'],
                                         'check' => "unknown history");
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $cl_history;
        }

        public function getHistoryById ($id_history){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM History WHERE id_history = '$id_history'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $history = array('0' => "Client's history is empty");
                }
                else{
                    foreach ($log as $row) {
                        $c_key = $row['id_history'];
                        $history = array( $c_key => array('id_history' => $row['id_history'],
                                                            'id_client' => $row['id_client'],
                                                            'id_car' => $row['id_car'],
                                                            'date_issue' => $row['date_issue'],
                                                            'date_return' => $row['date_return']));
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $history;
        }

        public function addClient ($login,$password,$first_name,$second_name,$middle_name,$address,$phone){
            $conn = $this->createConnection ();
            $flag = True;
            try{
                $sql = "INSERT INTO Clients (login,password,first_name,second_name,middle_name,address,phone) 
                        VALUES ('$login','$password','$first_name','$second_name','$middle_name','$address','$phone')";
                $conn->exec($sql);
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                $flag = False;
            }
            $conn = null;
            return $flag;
        }

        public function addCar ($brand,$cost,$tipe,$icon){
            $conn = $this->createConnection ();
            $flag = True;
            try{
                $sql = "INSERT INTO Car_rent (brand,cost,tipe,icon)
                        VALUES ('$brand','$cost','$tipe','$icon')";
                $conn->exec($sql);
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                $flag = False;
            }
            $conn = null;
            return $flag;
        }

        public function addHistory ($id_client,$id_car,$date_issue,$date_return){
            $conn = $this->createConnection ();
            $flag = True;
            try{
                $sql = "INSERT INTO History (id_client,id_car,date_issue,date_return)
                        VALUES ('$id_client','$id_car','$date_issue','$date_return')";
                $conn->exec($sql);
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                $flag = False;
            }
            $conn = null;
            return $flag;
        }

        // public function getCarsByTime ($begin,$end){
        //     $conn = $this->createConnection ();
        //     try{
        //         $sql = "SELECT * FROM orders WHERE date_issue !(BETWEEN '$begin' AND '$end') AND date_return !(BETWEEN '$begin' AND '$end') ";
        //         $log = $conn->query($sql);
        //         if ($log->rowCount() == 0){
        //             $cars = array('0' => "Cars list is empty");
        //         }
        //         else{
        //             foreach ($log as $row) {
        //                 $c_key = $row['id_car'];
        //                 $cars = array( $c_key => array('id_car' => $row['id_car'],
        //                                                 'brand' => $row['brand'],
        //                                                 'cost' => $row['cost'],
        //                                                 'type' => $row['type'],
        //                                                 'icon' => $row['icon']));
        //             }
        //         }
        //     }
        //     catch(PDOException $e)
        //     {
        //         echo $sql . "<br>" . $e->getMessage();
        //     }
        //     $conn = null;
        //     return $cars;
        // }

    }

    $db = new DB_requests;
    $db->addClient("test2_login","test2_pass","test2_name","test2_sec","test2_last","test2_address","_phone2");
?>