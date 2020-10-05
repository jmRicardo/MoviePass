<?php
    namespace DAO;

    use Models\User as User;
    use DAO\Connection as Connection;

    interface IStudentDAO
    {
        function Add(User $user);
        function GetAll();
    }
?>