<?php
    namespace DAO;

    use \Exception as Exception;   
    use DAO\Connection as Connection;
    use DAO\IUserDAO as IUserDAO;
    use \PDO as PDO;
    use \PDOException as PDOException;

    class UserDAO implements IUserDAO
    {
        
        private $connection;
        private $tableName = "users";


        /**
         * Get DB connection
         *
         * @param void
         *
         * @return db connection
         */
        function getDatabaseConnection() {
            try { // connect to database and return connections
                $conn = new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS );
                return $conn;
            } catch ( PDOException $e ) { // connection to database failed, report error message
                return $e->getMessage();
            }
        }
        /**
         * Update user
         *
         * @param array $info
         *
         * @return void
         */
        function updateUserInfo( $info ) {
            // get database connection
            $databaseConnection = $this->getDatabaseConnection();
            $this->connection = Connection::GetInstance();



            // create our sql statment adding in password only if change password was checked
            $statement = $databaseConnection->prepare( '
                UPDATE
                    users
                SET
                    email = :email,
                    first_name = :first_name,
                    last_name = :last_name
                    ' . ( isset( $info['change_password'] ) ? ', password = :password ' : '' ) . '
                WHERE
                    key_value = :key_value
            ' );

            $params = array( //params 
                'email' => trim( $info['email'] ),
                'first_name' => trim( $info['first_name'] ),
                'last_name' => trim( $info['last_name'] ),
            );

            if ( isset( $info['change_password'] ) ) { // add password and key value if password checkbox is checked
                $params['password'] = $this->hashedPassword( $info['password'] );
                $params['key_value'] = $info['key_value'];
            } else { // only add key value, change password checkbox was not checked
                $params['key_value'] = $info['key_value'];
            }

            // run the sql statement
            $statement->execute( $params );
        }

        /**
         * Get row from a table with a value
         *
         * @param string $tableName
         * @param string $column
         * @param string $value
         *
         * @return array $info
         */
        function getRowWithValue( $tableName, $column, $value ) {
           

          /*   $this->connection = Connection::GetInstance();

            $query = "SELECT * FROM ".$this->tableName." WHERE ". $column . " = :" . $column;

            $params = array(
                $column => trim( $value ));

            $result = $this->connection->Execute($query,$params);

            var_dump($result);

            return $result;  */
            

            // get database connection
            $databaseConnection = $this->getDatabaseConnection();
 
             // create our sql statment
            $statement = $databaseConnection->prepare( '
                SELECT
                    *
                FROM
                    ' . $tableName . '
                WHERE
                    ' . $column . ' = :' . $column
            );

            // execute sql with actual values
            $statement->setFetchMode( PDO::FETCH_ASSOC );
            $statement->execute( array(
                $column => trim( $value )
            ) );

            // get and return user
            $user = $statement->fetch();
            return $user;    
        }

        /**
         * Get user with email address
         *
         * @param array $email
         *
         * @return array $userInfo
         */
        function getUserWithEmailAddress( $email ) {
            // get database connection
            $databaseConnection = $this->getDatabaseConnection();

            // create our sql statment
            $statement = $databaseConnection->prepare( '
                SELECT
                    *
                FROM
                    users
                WHERE
                    email = :email
            ' );

            // execute sql with actual values
            $statement->setFetchMode( PDO::FETCH_ASSOC );
            $statement->execute( array(
                'email' => trim( $email )
            ) );

            // get and return user
            $user = $statement->fetch();
            return $user;
        }

        /**
         * Update a colum with a value in a table by id
         *
         * @param string $tableName
         * @param string $column
         * @param string $value
         * @param string $id
         *
         * @return void
         */
        function updateRow( $tableName, $column, $value, $id ) {
            // get database connection
            $databaseConnection = $this->getDatabaseConnection();

            // create our sql statment
            $statement = $databaseConnection->prepare( '
                UPDATE
                    ' . $tableName . '
                SET
                    ' . $column . ' = :value
                WHERE
                    id = :id
            ' );

            // set our parameters to use with the statment
            $params = array(
                'value' => trim( $value ),
                'id' => trim( $id )
            );

            // run the query
            $statement->execute( $params );
        }

        /**
         * Sign a user up
         *
         * @param array $info
         *
         * @return array $userInfo
         */
        function signUserUp( $info ) {
            // get database connection
            $databaseConnection = $this->getDatabaseConnection();

            // create our sql statment
            $statement = $databaseConnection->prepare( '
                INSERT INTO
                    users (
                        email,
                        first_name,
                        last_name,
                        password,
                        key_value,
                        fb_user_id,
                        fb_access_token
                    )
                VALUES (
                    :email,
                    :first_name,
                    :last_name,
                    :password,
                    :key_value,
                    :fb_user_id,
                    :fb_access_token
                )
            ' );

            // execute sql with actual values
            $statement->execute( array(
                'email' => trim( $info['email'] ),
                'first_name' => trim( $info['first_name'] ),
                'last_name' => trim( $info['last_name'] ),
                'password' => isset( $info['password'] ) ? $this->hashedPassword( $info['password'] ) : '',
                'key_value' => $this->newKey(),
                'fb_user_id' => isset( $info['id'] ) ? $info['id'] : '',
                'fb_access_token' => isset( $info['fb_access_token'] ) ? $info['fb_access_token'] : '',
            ) );

            // return id of inserted row
            return $databaseConnection->lastInsertId();
        }

        /**
         * Generate a key for a user
         *
         * @param array $info
         *
         * @return array $userInfo
         */
        function newKey( $length = 32 ) {
            $time = md5( uniqid() ) . microtime();
            return substr( md5( $time ), 0, $length );
        }

        /**
         * Hash password
         *
         * @param String $password plain text password
         * @param String $salt to hash passoword with set to false auto gen one
         *
         * @return Sting of password now hashed
         */
        function hashedPassword( $password ) {
            $random = openssl_random_pseudo_bytes( 18 );
            $salt = sprintf( '$2y$%02d$%s',
                12, // 2^n cost factor, hackers got nothin on this!
                substr( strtr( base64_encode( $random ), '+', '.' ), 0, 22 )
            );

            // hash password with salt
            $hash = crypt( $password, $salt );

            // return hash
            return $hash;
        }    

    }
?>