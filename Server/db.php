<?php
    class DB_requests {

        private function createConnection () {
            $conn = new PDO('mysql:host = 178.132.201.118 ; dbname=rentnewc_db', 'rentnewc_db', '0O8k8Y8f');
            // Установить режим ошибки PDO в исключение
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }

    
        //Authorization client and Get client's info by login and password
        //@$login - client's login 
        //@$password - client's password
        //return client's data(array). The array contains the 'result' element. If the login is in DB and the password matches, then 'result' will be 'ok'. 
        //If the login is not in DB, the 'result' will be 'wrong login'. 
        //And if the login is there, but the password does not match, then 'result' will be 'wrong password'.
        public function authClient ($login,$password){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Clients WHERE login = '$login'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $client = array('result' => "wrong login");
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
                                            'result' => "ok");
                        }
                        else{
                            $client = array('result' => "wrong password");
                        }
                    }
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $client = array('result' => 'error');        
            }
            $conn = null;
            return $client;
        }

        //Get client's info by login and password
        //@$login - client's login 
        //return client's data(array). The array contains the 'result' element. If the login is in DB, then 'result' will be 'ok'. 
        //If the login is not in DB, the 'result' will be 'wrong login'. 
        public function getClientByLogin ($login){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Clients WHERE login = '$login'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $client = array('result' => "wrong login");
                }
                else{
                    foreach ($log as $row) {
                        $client = array('id_client' => $row['id_client'],
                                        'login' => $row['login'],
                                        'password' => $row['password'],
                                        'first_name' => $row['first_name'],
                                        'second_name' => $row['second_name'],
                                        'middle_name' => $row['middle_name'],
                                        'address' => $row['address'],
                                        'phone' => $row['phone'],
                                        'result' => "ok");
                        }
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $client = array('result' => 'error');            
            }
            $conn = null;
            return $client;
        }

        //Get client's info by id
        //@$id - client's id       
        //return client's data(array). The array contains the 'result' element. If the id is in DB, then 'result' will be 'ok'. 
        //If the id is not in DB, the 'result' will be 'wrong id'. 
        public function getClientById ($id_client){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Clients WHERE id_client = '$id_client'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $client = array('result' => "unknown client");
                }
                else{
                    foreach ($log as $row) {
                        $client = array('id_client' => $row['id_client'],
                                        'login' => $row['login'],
                                        'password' => $row['password'],
                                        'first_name' => $row['first_name'],
                                        'second_name' => $row['second_name'],
                                        'middle_name' => $row['middle_name'],
                                        'address' => $row['address'],
                                        'phone' => $row['phone'],
                                        'result' => "ok");
                        }
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $client = array('result' => 'error');
            }
            $conn = null;
            return $client;
        }

        //Delete Client's info from DB
        //@$login - client's login       
        //Return true if the request was successful or false if an error occurred
        public function DeleteClientByLogin ($login){
            $conn = $this->createConnection ();
            $flag = True;
            try{
                $sql = "DELETE FROM Clients WHERE login = '$login'";
                $conn->exec($sql);
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $flag = False;
            }
            $conn = null;
            return $flag;
        }

        //Get info about all clients
        //return all clients data(array). The key of the element is the client's id and the value is client's data(array).
        //the '0' element would be 'ok' if the request was successful.
        //the '0' element will be 'Clients list is empty' if table 'Clients' is empty.
        public function getAllClients (){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Clients";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $clients = array('0' => "Clients list is empty");
                }
                else{
                    foreach ($log as $row) {
                        $cl_key = $row['id_car'];
                        $clients[ $cl_key] =  array('id_client' => $row['id_client'],
                                                    'login' => $row['login'],
                                                    'password' => $row['password'],
                                                    'first_name' => $row['first_name'],
                                                    'second_name' => $row['second_name'],
                                                    'middle_name' => $row['middle_name'],
                                                    'address' => $row['address'],
                                                    'phone' => $row['phone']);
                    }
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $client = array('0' => 'error');
            }
            $conn = null;
            return $clients;
        }

        //Get Car's info by id
        //@$id - Car's id       
        //return Car's data(array). The array contains the 'result' element. If the id is in DB, then 'result' will be 'ok'. 
        //If the id is not in DB, the 'result' will be 'unknown car'.
        public function getCarByid ($id_car){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Car_rent WHERE id_car = '$id_car'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $car = array('result' => "unknown car");
                }
                else{
                    foreach ($log as $row) {
                        $car = array('id_car' => $row['id_car'],
                                     'brand' => $row['brand'],
                                     'cost' => $row['cost'],
                                     'type' => $row['type'],
                                     'icon' => $row['icon'],
                                     'status' => $row['status'],
                                     'result' => "ok");
                    }
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $client = array('result' => 'error');
            }
            $conn = null;
            return $car;
        }

        //Get info about all cars.
        //return all cars data(array). The key of the element is the cars's id and the value is cars's data(array).
        //the '0' element will be 'Cars list is empty' if table 'Car_rent' is empty.
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
                        $cars[$c_key] =  array('id_car' => $row['id_car'],
                                                'brand' => $row['brand'],
                                                'cost' => $row['cost'],
                                                'type' => $row['type'],
                                                'icon' => $row['icon'],
                                                'status' => $row['status']);
                    }
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $client = array('0' => 'error');
            }
            $conn = null;
            return $cars;
        }

        //Get info about all cars with requested status
        //@$status - Car's status      
        //return Car's data(array). The key of the element is the cars's id and the value is cars's data(array).
        //the '0' element will be 'There are no cars with this status' if table 'Car_rent' doesnt contain cars with requested status.
        public function getCarsByStatus ($status){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Car_rent WHERE status = '$status'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $cars = array('0' => "There are no cars with this status");
                }
                else{
                    foreach ($log as $row) {
                        $c_key = $row['id_car'];
                        $cars[$c_key] =  array('id_car' => $row['id_car'],
                                                'brand' => $row['brand'],
                                                'cost' => $row['cost'],
                                                'type' => $row['type'],
                                                'icon' => $row['icon'],
                                                'status' => $row['status']);
                    }
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $client = array('0' => 'error');
            }
            $conn = null;
            return $cars;
        }

        //Delete Car's info from DB
        //@$id - Car's id       
        //Return true if the request was successful or false if an error occurred
        public function DeleteCarByID ($id_car){
            $conn = $this->createConnection ();
            $flag = True;
            try{
                $sql = "DELETE FROM Car_rent WHERE id_car = '$id_car'";
                $conn->exec($sql);
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $flag = False;
            }
            $conn = null;
            return $flag;
        }

        //Get history record by id
        //@$id_history - id of the requested history      
        //return history's data(array). The array contains the 'result' element. If the id is in DB, then 'result' will be 'ok'. 
        //If the id is not in DB, the 'result' will be 'unknown history'.
        public function getHistoryById ($id_history){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM History WHERE id_history = '$id_history'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $history = array('result' => "unknown history");
                }
                else{
                    foreach ($log as $row) {
                        $history = array('id_history' => $row['id_history'],
                                         'id_client' => $row['id_client'],
                                         'id_car' => $row['id_car'],
                                         'date_issue' => $row['date_issue'],
                                         'date_return' => $row['date_return'],
                                         'state'=> $row['state'],
                                         'result' => "ok");
                    }
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $client = array('result' => 'error');
            }
            $conn = null;
            return $history;
        }
        
        //Get all records of the requested client
        //@$id_client - id of the requested client     
        //return history data(array). The key of the element is the history's id and the value is history data(array). 
        //If the id is not in DB, the '0' element will be 'Client's history is empty'.
        public function getClientHistory  ($id_client){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM History WHERE id_client = '$id_client'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $cl_history = array('0' => "Client's history is empty");
                }
                else{
                    $cl_history = array();
                    foreach ($log as $row) {
                        $cl_key = $row['id_history'];
                        $cl_history[$cl_key] = array('id_history' => $row['id_history'],
                                            'id_client' => $row['id_client'],
                                            'id_car' => $row['id_car'],
                                            'date_issue' => $row['date_issue'],
                                            'date_return' => $row['date_return'],
                                            'state'=> $row['state']);
                    }
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $client = array('0' => 'error');
            }
            $conn = null;
            return $cl_history;
        }

        //Add Client's info in DB
        //@$login - Client's login
        //@$password - Client's password
        //@$first_name - Client's first_name
        //@$second_name - Client's second_name
        //@$middle_name - Client's middle_name
        //@$address - Client's address
        //@$phone - Client's phone       
        //Return "ok" if the request was successful or "login is already taken" if this login is in the DB or "error",if an error occurred
        public function addClient ($login,$password,$first_name,$second_name,$middle_name,$address,$phone){
            $conn = $this->createConnection ();
            $result = "";
            try{
                $sel = "SELECT * FROM Clients WHERE login = '$login'";
                $ins = "INSERT INTO Clients (login,password,first_name,second_name,middle_name,address,phone) 
                        VALUES ('$login','$password','$first_name','$second_name','$middle_name','$address','$phone')";
                $log = $conn->query($sel);
                if ($log->rowCount() == 0){
                    $conn->exec($ins);
                    $result = "ok";
                }
                else{
                    $result = "login is already taken";
                }                
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $result = "error";
            }
            $conn = null;
            return $result;
        }

        //Add Car's info in DB
        //@$brand - Car's brand
        //@$cost - Car's cost
        //@$tipe - Car's tipe
        //@$icon - link on the car's icon
        //@$status - Car's status            
        //Return true if the request was successful or false if an error occurred
        public function addCar ($brand,$cost,$tipe,$icon,$status){
            $conn = $this->createConnection ();
            $flag = True;
            try{
                $sql = "INSERT INTO Car_rent (brand,cost,tipe,icon,status)
                        VALUES ('$brand','$cost','$tipe','$icon','$status')";
                $conn->exec($sql);
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $flag = False;
            }
            $conn = null;
            return $flag;
        }

        //Add history record in DB
        //@$id_client - id_client
        //@$id_car - id_car
        //@$date_issue - rental start date and time (format: 'yyyy-mm-dd hh:mm:ss')
        //@$date_return - date and time of the car return (format: 'yyyy-mm-dd hh:mm:ss')
        //@$state - history state(active, close, cancel)        
        //Return true if the request was successful or false if an error occurred
        public function addHistory ($id_client,$id_car,$date_issue,$date_return,$state){
            $conn = $this->createConnection ();
            $flag = True;
            try{
                $sql = "INSERT INTO History (id_client,id_car,date_issue,date_return,state)
                        VALUES ('$id_client','$id_car','$date_issue','$date_return','$state')";
                        
                $conn->exec($sql);
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $flag = False;
            }
            $conn = null;
            return $flag;
        }

        //Update Client's info in DB
        //@$id_client - id of the requested client
        //@$login - new(or old) Client's login
        //@$password - new(or old) Client's password
        //@$first_name - new(or old) Client's first_name
        //@$second_name - new(or old) Client's second_name
        //@$middle_name - new(or old) Client's middle_name
        //@$address - new(or old) Client's address
        //@$phone - new(or old) Client's phone       
        //Return "ok" if the request was successful or "unknown client" if this id is not in the DB or "error",if an error occurred
        public function updateClientInfoById ($id_client,$login,$password,$first_name,$second_name,$middle_name,$address,$phone){
            $conn = $this->createConnection ();
            $result = "";
            try{
                $sel = "SELECT * FROM Clients WHERE id_client = '$id_client'";                      
                $log = $conn->query($sel);
                if ($log->rowCount() == 0){
                    $result = "unknown client";
                }
                else{
                    $upd = "UPDATE Clients set login = '$login',
                                                password = '$password', 
                                                first_name = '$first_name', 
                                                second_name = '$second_name', 
                                                middle_name = '$middle_name', 
                                                address = '$address', 
                                                phone = '$phone'
                                            where id_client = '$id_client'";      
                    $conn->exec($upd);
                    $result = "ok";                    
                }                
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $result = "error";
            }
            $conn = null;
            return $result;
        }

        //Update Car's info in DB
        //@$id_car - id of the requested Car
        //@$brand - new(or old) Car's brand
        //@$cost - new(or old) Car's cost
        //@$tipe - new(or old) Car's tipe
        //@$icon - new(or old) link on the car's icon
        //@$status - new(or old) Car's status            
        //Return true if the request was successful or false if an error occurred
        public function updateCarInfoById ($id_car,$brand,$cost,$type,$icon,$status){
            $conn = $this->createConnection ();
            $result = "";
            try{
                $sel = "SELECT * FROM Car_rent WHERE id_car = '$id_car'";                      
                $log = $conn->query($sel);
                if ($log->rowCount() == 0){
                    $result = "unknown car";
                }
                else{
                    $upd = "UPDATE Car_rent set brand = '$brand',
                                                cost = '$cost', 
                                                type = '$type', 
                                                icon = '$icon', 
                                                status = '$status',
                                            where id_car = '$id_car'";      
                    $conn->exec($upd);
                    $result = "ok";
                    
                }                
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $result = "error";
            }
            $conn = null;
            return $result;
        }

        //Update History info in DB
        //@$id_history - id of the requested history
        //@$id_client - new(or old) id_client
        //@$id_car - new(or old) id_car
        //@$date_issue - new(or old) rental start date and time (format: 'yyyy-mm-dd hh:mm:ss')
        //@$date_return - new(or old) date and time of the car return (format: 'yyyy-mm-dd hh:mm:ss')
        //@$state - new(or old) history state(active, close, cancel)           
        //Return true if the request was successful or false if an error occurred
        public function updateHistoryById ($id_history,$id_client,$id_car,$date_issue,$date_return,$state){
            $conn = $this->createConnection ();
            $result = "";
            try{
                $sel = "SELECT * FROM History WHERE id_history = '$id_history'";                      
                $log = $conn->query($sel);
                if ($log->rowCount() == 0){
                    $result = "unknown history";
                }
                else{
                    $upd = "UPDATE History set id_client = '$id_client',
                                                id_car = '$id_car', 
                                                date_issue = '$date_issue', 
                                                date_return = '$date_return', 
                                                state = '$state',
                                            where id_history = '$id_history'";      
                    $conn->exec($upd);
                    $result = "ok";
                    
                }                
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $result = "error";
            }
            $conn = null;
            return $result;
        }


    }

?>
