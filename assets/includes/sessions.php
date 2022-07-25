<?php 
    session_start();

    function errorMessage(){
        if(isset($_SESSION['errorMessage'])){
            $message = "<div class=\"alert bg-danger text-center text-light shadow alert-dismissible position-fixed w-50 wi animate__animated animate__slideInDown \" role=\"alert\" style=\"top:15%; left:35%;\">";
            $message .= htmlentities($_SESSION['errorMessage']);
            $message .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>";
            $message .= "</div>";
            $_SESSION['errorMessage'] = null;
            return $message;
        }
    }

    function successMessage(){
        if(isset($_SESSION['successMessage'])){
            $message = "<div class=\"alert bg-success text-center text-light shadow alert-dismissible position-fixed w-50 wi animate__animated animate__slideInDown \" role=\"alert\" style=\"top:15%; left:35%;\">";
            $message .= htmlentities($_SESSION['successMessage']);
            $message .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>";
            $message .= "</div>";
            $_SESSION['successMessage'] = null;
            return $message;
        }
    }

    function auth(){
        if (!isset($_SESSION['id'])) {
            header('Location:../login');
        }
    }

    function adminAuth(){
        if ($_SESSION['role'] !== 'admin') {
            header('Location: dashboard');
        }
    }