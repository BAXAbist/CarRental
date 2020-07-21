<?php
    class DB_requests {

        private function createConnection () {
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );
            $conn = new PDO('mysql:host = 178.132.201.118 ; dbname=rentnewc_db', 'rentnewc_db', '0O8k8Y8f', $options);
            // Установить режим ошибки PDO в исключение
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }

    
        //Authorization client and Get client's info by login and password
        //@$login - client's login 
        //@$password - client's password
        //@return client's data(array). The array contains the 'result' element. If the login is in DB and the password matches, then 'result' will be 'ok'. 
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
        //@return client's data(array). The array contains the 'result' element. If the login is in DB, then 'result' will be 'ok'. 
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
        //@return client's data(array). The array contains the 'result' element. If the id is in DB, then 'result' will be 'ok'. 
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
        //@return true if the request was successful or false if an error occurred
        public function DeleteClientByLogin ($login){
            $conn = $this->createConnection ();
            $result = "";
            try{
                $sql = "DELETE FROM Clients WHERE login = '$login'";
                $conn->exec($sql);
                $result = "ok";
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $result = "error";
            }
            $conn = null;
            return $result;
        }

        //Get info about all clients
        //@return all clients data(array). The key of the element is the client's id and the value is client's data(array).
        //the '0' element would be 'ok' if the request was successful.
        //the '0' element will be 'Clients list is empty' if table 'Clients' is empty.
        public function getAllClients (){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Clients";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $clients[] = array('0' => "Clients list is empty");
                }
                else{
                    foreach ($log as $row) {                        
                        $clients[] =  array('id_client' => $row['id_client'],
                                                    'login' => $row['login'],
                                                    'password' => $row['password'],
                                                    'first_name' => $row['first_name'],
                                                    'second_name' => $row['second_name'],
                                                    'middle_name' => $row['middle_name'],
                                                    'address' => $row['address'],
                                                    'phone' => $row['phone']);
                    }
                    $clients[] = array('0' => "ok");
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $clients[] = array('0' => 'error');
            }
            $conn = null;
            return $clients;
        }

        //Get Car's info by id
        //@$id - Car's id       
        //@return Car's data(array). The array contains the 'result' element. If the id is in DB, then 'result' will be 'ok'. 
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
                $car = array('result' => 'error');
            }
            $conn = null;
            return $car;
        }

        //Get info about all cars.
        //@return all cars data(array). The key of the element is the cars's id and the value is cars's data(array).
        //the '0' element will be 'Cars list is empty' if table 'Car_rent' is empty.
        public function getAllCars (){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM Car_rent";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $cars[] = array('0' => "Cars list is empty");
                }
                else{
                    foreach ($log as $row) {                        
                        $cars[] =  array('id_car' => $row['id_car'],
                                                'brand' => $row['brand'],
                                                'cost' => $row['cost'],
                                                'type' => $row['type'],
                                                'icon' => $row['icon'],
                                                'status' => $row['status']);
                    }
                    $cars[] = array('0' => "ok");
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $cars[] = array('0' => 'error');
            }
            $conn = null;
            return $cars;
        }

        //Get info about all cars with requested status
        //@$status - Car's status      
        //@return Car's data(array). The key of the element is the cars's id and the value is cars's data(array).
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
                        $cars[] =  array('id_car' => $row['id_car'],
                                                'brand' => $row['brand'],
                                                'cost' => $row['cost'],
                                                'type' => $row['type'],
                                                'icon' => $row['icon'],
                                                'status' => $row['status']);
                    }
                    $cars[] = array('0' => "ok");
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $cars[] = array('0' => 'error');
            }
            $conn = null;
            return $cars;
        }

        //Delete Car's info from DB
        //@$id - Car's id       
        //@return true if the request was successful or false if an error occurred
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
        //@return history's data(array). The array contains the 'result' element. If the id is in DB, then 'result' will be 'ok'. 
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
                $history = array('result' => 'error');
            }
            $conn = null;
            return $history;
        }
        
        //Get all history records              
        //@return history's data(array). The key of the element is the id_history and the value is history's data(array).
        //the '0' element will be 'History is empty' if table 'History' doesnt contain any records.
        public function getHistory (){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM History";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $history[] = array('0' => "History is empty");
                }
                else{
                    foreach ($log as $row) {                        
                        $history[] =  array('id_history' => $row['id_history'],
                                                'id_client' => $row['id_client'],
                                                'id_car' => $row['id_car'],
                                                'date_issue' => $row['date_issue'],
                                                'date_return' => $row['date_return'],
                                                'state' => $row['state']);
                    }
                    $history[] = array('0' => "ok");
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $history[] = array('0' => 'error');
            }
            $conn = null;
            return $history;
        }

        //Get all history records with requested status
        //@$state - requested state      
        //@return history's data(array). The key of the element is the id_history and the value is history's data(array).
        //the '0' element will be 'There are no records with this state' if table 'History' doesnt contain cars with requested state.
        public function getHistoryByState ($state){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM History WHERE state = '$state'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $history[] = array('0' => "There are no records with this state");
                }
                else{
                    foreach ($log as $row) {                        
                        $history[] =  array('id_history' => $row['id_history'],
                                                'id_client' => $row['id_client'],
                                                'id_car' => $row['id_car'],
                                                'date_issue' => $row['date_issue'],
                                                'date_return' => $row['date_return'],
                                                'state' => $row['state']);
                    }
                    $history[] = array('0' => "ok");
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $history[] = array('0' => 'error');
            }
            $conn = null;
            return $history;
        }
   

        //Get all records of the requested client
        //@$id_client - id of the requested client     
        //@return history data(array). The key of the element is the history's id and the value is history data(array). 
        //If the id is not in DB, the '0' element will be 'Client's history is empty'.
        public function getClientHistory  ($id_client){
            $conn = $this->createConnection ();
            try{
                $sql = "SELECT * FROM History WHERE id_client = '$id_client'";
                $log = $conn->query($sql);
                if ($log->rowCount() == 0){
                    $cl_history[] = array('0' => "Client's history is empty");
                }
                else{
                    $cl_history = array();
                    foreach ($log as $row) {                        
                        $cl_history[] = array('id_history' => $row['id_history'],
                                            'id_client' => $row['id_client'],
                                            'id_car' => $row['id_car'],
                                            'date_issue' => $row['date_issue'],
                                            'date_return' => $row['date_return'],
                                            'state'=> $row['state']);
                    }
                    $cl_history[] = array('0' => "ok");
                }
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $cl_history[] = array('0' => 'error');
            }
            $conn = null;
            return $cl_history;
        }

        //Delete History record info from DB
        //@$id_history - id requested history     
        //@return true if the request was successful or false if an error occurred
        public function DeleteHistoryById ($id_history){
            $conn = $this->createConnection ();
            $result = "";
            try{
                $sql = "DELETE FROM History WHERE id_history = '$id_history'";
                $conn->exec($sql);
                $result = "ok";
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $result = "error";
            }
            $conn = null;
            return $result;
        }



        //Add Client's info in DB
        //@$login - Client's login
        //@$password - Client's password
        //@$first_name - Client's first_name
        //@$second_name - Client's second_name
        //@$middle_name - Client's middle_name
        //@$address - Client's address
        //@$phone - Client's phone       
        //@return "ok" if the request was successful or "login is already taken" if this login is in the DB or "error",if an error occurred
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
        //@return true if the request was successful or false if an error occurred
        public function addCar ($brand,$cost,$type,$icon,$status){
            $conn = $this->createConnection ();            
            $flag = 'ok';
            try{
                $sql = "INSERT INTO Car_rent (brand,cost,tipe,icon,status)
                        VALUES ('$brand','$cost','$type','$icon','$status')";
                $conn->exec($sql);
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $flag = "error";
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
        //@return true if the request was successful or false if an error occurred
        public function addHistory ($id_client,$id_car,$date_issue,$date_return,$state){
            $conn = $this->createConnection ();
            $flag = 'ok';
            try{
                $sql = "INSERT INTO History (id_client,id_car,date_issue,date_return,state)
                        VALUES ('$id_client','$id_car','$date_issue','$date_return','$state')";
                        
                $conn->exec($sql);
            }
            catch(PDOException $e)
            {
                // echo $sql . "<br>" . $e->getMessage();
                $flag = 'error';
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
        //@return "ok" if the request was successful or "unknown client" if this id is not in the DB or "error",if an error occurred
        public function updateClientInfoById ($id_client,$login,$password,$first_name,$second_name,$middle_name,$address,$phone){
            $conn = $this->createConnection ();
            $result = "";
            try{
                $sel_login = "SELECT * FROM Clients WHERE login = '$login'";
                $login_check = $conn->query($sel_login);
                if ($login_check->rowCount() != 0){
                    $result = "login is already taken";
                }
                else{
                    $sel_id = "SELECT * FROM Clients WHERE id_client = '$id_client'";                      
                    $log = $conn->query($sel_id);
                    if ($log->rowCount() == 0){
                        $result = "unknown client";
                    }
                    else{
                        $update = "set ";
                        if($login != null){
                            $update .= "login = '$login',";
                        }
                        if($password != null){
                            $update .= " password = '$password',";
                        }
                        if($first_name != null){
                            $update .= " first_name = '$first_name',";
                        }
                        if($second_name != null){
                            $update .= " second_name = '$second_name',";
                        }
                        if($middle_name != null){
                            $update .= " middle_name = '$middle_name',";
                        }
                        if($address != null){
                            $update .= " address = '$address',";
                        }
                        if($phone != null){
                            $update .= " phone = '$phone',";
                        }
                        $update = rtrim($update,",");
                        $upd = "UPDATE Clients ". $update. " where id_client = '$id_client'";
                        $conn->exec($upd);
                        $result = "ok";                    
                    }  
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

        //Update Client's password in DB
        //@$id_client - id of the requested client
        //@$old_pas - old Client's password
        //@$new_pas - new Client's password     
        //@return "ok" if the request was successful. return "unknown client" if this id is not in the DB.
        //return "wrong old password" if the old password does not match the one in the DB. return "error" if an error occurred
        public function updateClientPassword ($id_client,$old_pas,$new_pas){
            $conn = $this->createConnection ();
            $result = "";
            try{
                $sel = "SELECT * FROM Clients WHERE id_client = '$id_client'";                
                $log = $conn->query($sel);
                if ($log->rowCount() == 0){                    
                    $result = "unknown client";
                }
                else{
                    foreach ($log as $row) {
                        if ($old_pas == $row['password']){
                            $upd = "UPDATE Clients set password = '$new_pas' where id_client = '$id_client'";
                            $conn->exec($upd);
                            $result = "ok";
                        }
                        else{
                            $result = "wrong old password";
                        }
                    }
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
        //@return true if the request was successful or false if an error occurred
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
                    $update = "set ";
                    if($brand != null){
                        $update .= "brand = '$brand',";
                    }
                    if($cost != null){
                        $update .= " cost = '$cost',";
                    }
                    if($type != null){
                        $update .= " type = '$type',";
                    }
                    if($icon != null){
                        $update .= " icon = '$icon',";
                    }
                    if($status != null){
                        $update .= " status = '$status',";
                    }            
                    $update = rtrim($update,",");
                    $upd = "UPDATE Car_rent ". $update. " where id_car = '$id_car'";      
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
        //@return true if the request was successful or false if an error occurred
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
                    $update = "set ";
                    if($id_client != null){
                        $update .= "id_client = '$id_client',";
                    }
                    if($id_car != null){
                        $update .= " id_car = '$id_car',";
                    }
                    if($date_issue != null){
                        $update .= " date_issue = '$date_issue',";
                    }
                    if($date_return != null){
                        $update .= " date_return = '$date_return',";
                    }
                    if($state != null){
                        $update .= " state = '$state',";
                    }            
                    $update = rtrim($update,",");
                    $upd = "UPDATE History ". $update. " where id_history = '$id_history'";      
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

    // $db = new DB_requests;
    // $db->addClient("test2_login","test2_pass","test2_name","test2_sec","test2_last","test2_address","_phone2");
?>
