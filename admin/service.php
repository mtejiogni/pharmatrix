<?php
session_start();

require_once 'model/All_medicamentDB.php';
require_once 'model/Coupon_medicamentDB.php';
require_once 'model/CouponDB.php';
require_once 'model/MedicamentDB.php';
require_once 'model/PharmacieDB.php';
require_once 'model/Users_pharmacieDB.php';
require_once 'model/UsersDB.php';

require_once 'tools/Package.php';

$all_medicamentdb= new All_medicamentDB();
$coupon_medicamentdb= new Coupon_medicamentDB();
$coupondb= new CouponDB();
$medicamentdb= new MedicamentDB();
$pharmaciedb= new PharmacieDB();
$users_pharmaciedb= new Users_pharmacieDB();
$usersdb= new UsersDB();

$package= new Package();

?>