<?php
include("../config/dbcon.php");

// Get All Dealers
function getAllDealers($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE role='dealer'";
    return $query_run = mysqli_query($con, $query);
}

// Get All SubAdmin
function getAllsubAdmin($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE role='sub-admin'";
    return $query_run = mysqli_query($con, $query);
}

// Get All Users
function getAllUsers($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE role!='admin'";
    return $query_run = mysqli_query($con, $query);
}

function getById($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

// Get Profile
function getProfile($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($con, $query);
}


// Testimonials
function getalltestimonials($table)
{
    global $con;
    $query = "SELECT * FROM $table ORDER BY id DESC";
    return $query_run = mysqli_query($con, $query);
}

function getTestimonialID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($con, $query);
}

//Contact-Us Details
function getContactUs($table) 
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

// countries and State
function getCountries($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}
function getState($table)
{
    global $con;
    $query ="SELECT * FROM $table ORDER BY id DESC";
    return $query_run = mysqli_query($con, $query);
}
function getStateCountry($table)
{
    global $con;
    $query = "SELECT countries.name as countries_name, $table.name, $table.id, $table.country_id FROM countries LEFT JOIN $table ON countries.id = $table.country_id ORDER BY countries_name DESC";
    return $query_run = mysqli_query($con, $query);
}

// subscribers
function getSubscribers($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getCountriesStatewise($table1, $table2)
{
    global $con;
    $query = "SELECT $table1.name, $table2.name  FROM $table1 LEFT JOIN states ON $table1.id=$table2.country_id";
    return $query_run = mysqli_query($con, $query);
}


// pass to gaurav
function getProductsjoinData($table_one,$table_two,$table_three){
    global $con;
    $query = "SELECT $table_one.*,$table_two.product_image,$table_three.name as category_name FROM $table_one LEFT JOIN $table_two ON $table_one.id = $table_two.product_id LEFT JOIN $table_three ON $table_one.primary_category_id = $table_three.id WHERE $table_two.priority = '1' ORDER BY $table_one.id";
    return $query_run = mysqli_query($con, $query);
}

// pass to gaurav
function groupconcatenate($table_one,$table_two,$id){
    global $con;
    $sql = "SELECT $table_two.*, GROUP_CONCAT($table_one.product_image SEPARATOR ', ') AS product_image
        FROM $table_one
        LEFT JOIN $table_two ON $table_one.product_id = $table_two.id
        WHERE $table_two.id = $id
        GROUP BY $table_two.id";
        return $query_run = mysqli_query($con, $sql);
}
?>