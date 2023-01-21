<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSSC</title>
    <link rel="icon" href="https://img.icons8.com/nolan/128/note.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php echo link_tag(base_url('assets/css/custom.css')); ?>
    <script src="https://kit.fontawesome.com/79e546177a.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex flex-column vh-100">
    <?php if(!in_array($this->router->fetch_method(), ['login','signup'])){ ?>
    <!-- Header -->
    <header class="sticky-top shadow navbar-color">
        <!-- Navbar -->
        <nav class="navbar container-xl">
            <div class="nav nav-fill container-fluid">
                <!-- Navbar brand i.e. logo -->
                <a class="btn navbar-brand text-primary btn-light" href="<?php echo base_url('main'); ?>">
                <img src="https://img.icons8.com/nolan/96/note.png" width="30px"/></a>
                <!-- Search Bar and Button -->
                <?php 
                if($this->router->fetch_method() != 'index') {
                ?>
                <div class="col-3 col-sm-4 col-md-6">
                    <form class="d-flex" action="<?php echo base_url('main/search'); ?>" method="GET">
                        <input class="form-control rounded-0 border-0" type="search" placeholder="Search" name="search">
                        <button class="btn btn-light rounded-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <?php } ?>
                <!-- Login & SignUp Buttons -->
                <div>
                <?php
                    if(isset($_SESSION['user_name'])){
                ?>
                    <!-- When logged in -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user_name']; ?></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" type="button" href="<?php echo base_url('main/profile'); ?>">Profile</a></li>
                        <li><a class="dropdown-item" type="button" href="<?php echo base_url('main/logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
                <?php
                    }else{
                ?>
                    <!-- When not logged in -->
                    <a class="btn btn-light mx-1" href="<?php echo base_url('main/login'); ?>">LOGIN</a>
                    <a class="btn btn-outline-light" href="<?php echo base_url('main/signup'); ?>">SIGN UP</a>
                <?php } ?>
                </div>
            </div>
        </nav>
    </header>
    <?php } ?>
    <section class="container-xl flex-grow-1">
    <section class="sec">
	<div class="colour"></div>
	<div class="colour"></div>
	<div class="colour"></div>
    <section class="container-xl flex-grow-1 z-1">