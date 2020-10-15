<?php
    namespace DAO;

    use Models\User as User;
    use DAO\Connection as Connection;

    interface IUserDAO
    {
        function getDatabaseConnection();
        function updateUserInfo( $info );
        function getRowWithValue( $tableName, $column, $value );
        function getUserWithEmailAddress( $email );
        function updateRow( $tableName, $column, $value, $id );
        function signUserUp( $info );
        function newKey( $length = 32 );
        function hashedPassword( $password );
        static function isAdmin();
    }
?>