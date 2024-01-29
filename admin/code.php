<?php
session_start();
include('../config/dbcon.php');
include('../function/myfunction.php');

if(isset($_POST['updateStatusRole']))
{
    $userId = $_POST['userId'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));
    $query_update = "UPDATE users SET status='$status', role='$role', `updated_at= '$updated_at' WHERE id ='$userId'";
    $query_update_run = mysqli_query($con, $query_update);
    if($query_update_run)
    {
        redirect("edit-user.php?id=$userId", "User Updated Successfully");
    }
    else
    {
        redirect("edit-user.php?id=$userId", "Something Went Wrong");
    }
}
elseif(isset($_POST['delete_user']))
{
    $userId = mysqli_real_escape_string($con, $_POST['user_id']);

    $delete_query = "DELETE FROM users WHERE id = '$userId'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("users.php", "User deleted Successfully");
    }
    else
    {   
        redirect("users.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['delete_subAdmin']))
{
    $userId = mysqli_real_escape_string($con, $_POST['user_id']);

    $delete_query = "DELETE FROM users WHERE id = '$userId'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("subAdmin.php", "User deleted Successfully");
    }
    else
    {   
        redirect("subAdmin.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['delete_dealer']))
{
    $userId = mysqli_real_escape_string($con, $_POST['user_id']);

    $delete_query = "DELETE FROM users WHERE id = '$userId'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("dealers.php", "User deleted Successfully");
    }
    else
    {   
        redirect("dealers.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['delete_testimonial']))
{
    $userId = mysqli_real_escape_string($con, $_POST['user_id']);

    $delete_query = "DELETE FROM testimonials WHERE id = '$userId'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("testimonials.php", "Testimonials deleted Successfully");
    }
    else
    {   
        redirect("testimonials.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['delete_countries']))
{
    $userId = mysqli_real_escape_string($con, $_POST['user_id']);

    $delete_query = "DELETE FROM countries WHERE id = '$userId'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("countries.php", "Country deleted Successfully");
    }
    else
    {   
        redirect("countries.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['delete_product']))
{
    $userId = mysqli_real_escape_string($con, $_POST['user_id']);

    $delete_query = "DELETE FROM products WHERE id = '$userId'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("viewProduct.php", "Product deleted Successfully");
    }
    else
    {   
        redirect("viewProduct.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['delete_models']))
{
    $userId = mysqli_real_escape_string($con, $_POST['user_id']);

    $delete_query = "DELETE FROM models WHERE id = '$userId'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("models.php", "Model deleted Successfully");
    }
    else
    {   
        redirect("models.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['delete_makes']))
{
    $userId = mysqli_real_escape_string($con, $_POST['user_id']);

    $delete_query = "DELETE FROM makes WHERE id = '$userId'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("makes.php", "Makes deleted Successfully");
    }
    else
    {   
        redirect("makes.php", "Something Went Wrong");
    }
}elseif(isset($_POST['delete_menu'])){
    $menu_id = mysqli_real_escape_string($con, $_POST['menu_id']);

    $delete_query = "DELETE FROM header_menu WHERE id = '$menu_id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("navMenu.php", "Menu deleted Successfully");
    }
    else
    {   
        redirect("navMenu.php", "Menu  not deleted Successfully");
    }
}
elseif(isset($_POST['delete_commonPage']))
{
    $userId = mysqli_real_escape_string($con, $_POST['id']);

    $delete_query = "DELETE FROM common_pages WHERE id = '$userId'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run)
    {
        redirect("commonPages.php", "Common Page deleted Successfully");
    }
    else
    {   
        redirect("commonPages.php", "Something Went Wrong");
    }
}


// Create Sub Admin 
if(isset($_POST['subAdminSubmit']))
{
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $role = mysqli_real_escape_string($con, "sub-admin");
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        redirect("createSubAdmin.php", "Email already Registerd");
    }
    else 
    {
        $insert_query = "INSERT INTO users (firstname, lastname, username, email, phone, role, password) VALUES ('$firstname','$lastname','$username','$email','$phone','$role','$password')";
        $inser_query_run = mysqli_query($con,$insert_query);
        if($inser_query_run){
            redirect("createSubAdmin.php", "Sub-Admin Created Successfully");
        }else {
            redirect("createSubAdmin.php", "Something Went Wrong");
        }
    }

}

// Edit User Profile 
if(isset($_POST['profileSubmit']))
{
    $firstname =  $_POST['firstname'];
    $lastname =  $_POST['lastname'];
    $username =  $_POST['username'];
    $email =  $_POST['email'];
    $phone =  $_POST['phone'];
    $userId =  $_POST['userId'];
    $status =  $_POST['status'];
    $role =  $_POST['role'];
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));
    // $password =  $_POST['password'];

    $query_update = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', phone='$phone', status='$status', role='$role', `updated_at= '$updated_at' WHERE id ='$userId'";
    // print_r($query_update);
    // die();
    $query_update_run = mysqli_query($con, $query_update);

    if($query_update_run)
    {
        redirect("editProfile.php?id=$userId", "User Prfile Updated Successfully");
    }
    else
    {
        redirect("editProfile.php?id=$userId", "Something Went Wrong");
    }
}

// Create Testimonials
if(isset($_POST['testimonialSubmit']))
{
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $insert_query = "INSERT INTO testimonials (`title`, `description`, `status`) VALUES ('$title','$description','$status')";
    $inser_query_run = mysqli_query($con,$insert_query);

    if($inser_query_run){
        redirect("createTestimonials.php", "Testimonial Created Successfully");
    }else {
        redirect("createTestimonials.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['updateTestimonial']))
{
    $title =  mysqli_real_escape_string($con,$_POST['title']);
    $description =  mysqli_real_escape_string($con,$_POST['description']);
    $status =  mysqli_real_escape_string($con,$_POST['status']);
    $userId = mysqli_real_escape_string($con,$_POST['userId']);
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));

    $query_update = "UPDATE testimonials SET `title`='$title', `description`='$description', `status`='$status', `updated_at= '$updated_at' WHERE id ='$userId'";
    // print_r($query_update);
    // die();
    $query_update_run = mysqli_query($con, $query_update);

    if($query_update_run)
    {
        redirect("edit-testimonial.php?id=$userId", "Testimonials Updated Successfully");
    }
    else
    {
        redirect("edit-testimonial.php?id=$userId", "Something Went Wrong");
    }
}

// Create Countries
if(isset($_POST['countrySubmit']))
{
    $shortname = mysqli_real_escape_string($con, $_POST['shortname']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phonecode = mysqli_real_escape_string($con, $_POST['phonecode']);

    $insert_query = "INSERT INTO countries (`shortname`, `name`, `phonecode`) VALUES ('$shortname','$name','$phonecode')";
    $inser_query_run = mysqli_query($con,$insert_query);

    if($inser_query_run){
        redirect("createCountries.php", "Country Created Successfully");
    }else {
        redirect("createCountries.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['stateSubmit']))
{
    $shortname = mysqli_real_escape_string($con, $_POST['shortname']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phonecode = mysqli_real_escape_string($con, $_POST['phonecode']);

    $insert_query = "INSERT INTO states (`shortname`, `name`, `phonecode`) VALUES ('$shortname','$name','$phonecode')";
    $inser_query_run = mysqli_query($con,$insert_query);

    if($inser_query_run){
        redirect("createState.php", "State Created Successfully");
    }else {
        redirect("createState.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['editCountrySubmit']))
{
    $shortname =  mysqli_real_escape_string($con,$_POST['shortname']);
    $name =  mysqli_real_escape_string($con,$_POST['name']);
    $phonecode =  mysqli_real_escape_string($con,$_POST['phonecode']);
    $userId = mysqli_real_escape_string($con,$_POST['userId']);
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));

    $query_update = "UPDATE countries SET `shortname`='$shortname', `name`='$name', `phonecode`='$phonecode', `updated_at`='$updated_at' WHERE id ='$userId'";
    // print_r($query_update);
    // die();
    $query_update_run = mysqli_query($con, $query_update);

    if($query_update_run)
    {
        redirect("editCountry.php?id=$userId", "Country Updated Successfully");
    }
    else
    {
        redirect("editCountry.php?id=$userId", "Something Went Wrong");
    }
}
elseif(isset($_POST['createState']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $country_id = mysqli_real_escape_string($con, $_POST['country_id']);
    $insert_query = "INSERT INTO states (`name`, `country_id`) VALUES ('$name','$country_id')";
    
    $inser_query_run = mysqli_query($con,$insert_query);
    if($inser_query_run){
        redirect("state.php", "Country Created Successfully");
    }else {
        redirect("state.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['editSubscribersSubmit']))
{

    $email =  mysqli_real_escape_string($con,$_POST['email']);
    $category =  mysqli_real_escape_string($con,$_POST['category']);
    $status =  mysqli_real_escape_string($con,$_POST['status']);
    $userId = mysqli_real_escape_string($con,$_POST['userId']);
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));

    $query_update = "UPDATE subscribers SET `email`='$email', `category`='$category', `status`='$status', `updated_at`='$updated_at' WHERE id ='$userId'";
    $query_update_run = mysqli_query($con, $query_update);

    if($query_update_run)
    {
        redirect("editsubscriber.php?id=$userId", "Country Updated Successfully");
    }
    else
    {
        redirect("editsubscriber.php?id=$userId", "Something Went Wrong");
    }
}
elseif(isset($_POST['makesSubmit']))
{
    $makes = mysqli_real_escape_string($con,$_POST['makes']);
    $status = mysqli_real_escape_string($con,$_POST['status']);
    // print_r($_POST);
    // die();

    $query_update = "INSERT INTO makes (`makes`, `status`) VALUES ('$makes','$status')";
    $query_update_run = mysqli_query($con, $query_update);

    if($query_update_run)
    {
        redirect("makes.php", "Mates Created Successfully");
    }
    else
    {
        redirect("makes.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['editMakesSubmit']))
{
    $makes = mysqli_real_escape_string($con,$_POST['makes']);
    $status = mysqli_real_escape_string($con,$_POST['status']);
    $userId = mysqli_real_escape_string($con,$_POST['userId']);
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));

    $query_update = "UPDATE makes SET `makes`='$makes', `status`='$status', `updated_at`='$updated_at'  WHERE id ='$userId'";
    $query_update_run = mysqli_query($con, $query_update);

    if($query_update_run)
    {
        redirect("editMakes.php?id=$userId", "Makes Updated Successfully");
    }
    else
    {
        redirect("editMakes.php?id=$userId", "Something Went Wrong");
    }
}
elseif(isset($_POST['modelsSubmit']))
{
    $makes_id = mysqli_real_escape_string($con,$_POST['makes_id']);
    $models = mysqli_real_escape_string($con,$_POST['models']);
    $status = mysqli_real_escape_string($con,$_POST['status']);
    // $userId = mysqli_real_escape_string($con,$_POST['userId']);
    // $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));

    $query_update = "INSERT INTO models (`makes_id`, `models`, `status`) VALUES ('$makes_id','$models','$status')";
    $query_update_run = mysqli_query($con, $query_update);

    if($query_update_run)
    {
        redirect("models.php", "Mates Created Successfully");
    }
    else
    {
        redirect("models.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['editModelsSubmit']))
{
    $makes_id = mysqli_real_escape_string($con,$_POST['makes_id']);
    $models = mysqli_real_escape_string($con,$_POST['models']);
    $status = mysqli_real_escape_string($con,$_POST['status']);
    $userId = mysqli_real_escape_string($con,$_POST['userId']);
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));

    $query_update = "UPDATE models SET `makes_id`='$makes_id',`models`='$models', `status`='$status', `updated_at`='$updated_at'  WHERE id ='$userId'";
    $query_update_run = mysqli_query($con, $query_update);

    if($query_update_run)
    {
        redirect("editModels.php?id=$userId", "Model Updated Successfully");
    }
    else
    {
        redirect("editModels.php?id=$userId", "Something Went Wrong");
    }
}

//Create Products
if(isset($_POST['createProductSubmit']))
{
    $user_id = mysqli_real_escape_string($con, $_SESSION['auth_user']['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $admin_note = mysqli_real_escape_string($con, $_POST['admin_note']);
    $sales_price = mysqli_real_escape_string($con, $_POST['sales_price']);
    $inventory = mysqli_real_escape_string($con, $_POST['inventory']);
    $vin_number = mysqli_real_escape_string($con, $_POST['vin_number']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $is_sold = mysqli_real_escape_string($con, $_POST['is_sold']);
    $on_sale = mysqli_real_escape_string($con, $_POST['on_sale']);
    $bullet_proof = mysqli_real_escape_string($con, $_POST['bullet_proof']);

    $primary_category_id = mysqli_real_escape_string($con, $_POST['primary_category_id']);
    $machine_condition = mysqli_real_escape_string($con, $_POST['machine_condition']);
    $auction_scope = mysqli_real_escape_string($con, $_POST['auction_scope']);
    $certified = mysqli_real_escape_string($con, $_POST['certified']);
    $make = mysqli_real_escape_string($con, $_POST['make']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $manufacture_year = mysqli_real_escape_string($con, $_POST['manufacture_year']);
    $machine_current_location = mysqli_real_escape_string($con, $_POST['machine_current_location']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $horsepower = mysqli_real_escape_string($con, $_POST['horsepower']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $length = mysqli_real_escape_string($con, $_POST['length']);
    $width = mysqli_real_escape_string($con, $_POST['width']);
    $mileage = mysqli_real_escape_string($con, $_POST['mileage']);
    $drive = mysqli_real_escape_string($con, $_POST['drive']);
    $number_of_speed = mysqli_real_escape_string($con, $_POST['number_of_speed']);
    $suspension = mysqli_real_escape_string($con, $_POST['suspension']);
    $fuel_type = mysqli_real_escape_string($con, $_POST['fuel_type']);
    $engine = mysqli_real_escape_string($con, $_POST['engine']);
    $lift_capacity = mysqli_real_escape_string($con, $_POST['lift_capacity']);
    $lift_height = mysqli_real_escape_string($con, $_POST['lift_height']);
    $type_of_neck = mysqli_real_escape_string($con, $_POST['type_of_neck']);
    $floor_type = mysqli_real_escape_string($con, $_POST['floor_type']);

    $retail_contact_name = mysqli_real_escape_string($con, $_POST['retail_contact_name']);
    $Phone = mysqli_real_escape_string($con, $_POST['Phone']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $cab = mysqli_real_escape_string($con, $_POST['cab']);
    $transmission = mysqli_real_escape_string($con, $_POST['transmission']);
    $transmission_type = mysqli_real_escape_string($con, $_POST['transmission_type']);
    $axie = mysqli_real_escape_string($con, $_POST['axie']);
    $composition = mysqli_real_escape_string($con, $_POST['composition']);
    $liftgate = mysqli_real_escape_string($con, $_POST['liftgate']);
    $extendable = mysqli_real_escape_string($con, $_POST['extendable']);
    $equipment = mysqli_real_escape_string($con, $_POST['equipment']);
    $serial = mysqli_real_escape_string($con, $_POST['serial']);
    $drive_type = mysqli_real_escape_string($con, $_POST['drive_type']);
    $listing_type = mysqli_real_escape_string($con, $_POST['listing_type']);
    $rops_type = mysqli_real_escape_string($con, $_POST['rops_type']);

    // File upload handling
    $image = $_FILES['image']['name'];
    $temp_image = $_FILES['image']['tmp_name'];
    $absolute_path = realpath("/admin/uploads/");
    $destination_path = $absolute_path . '/' . $filename;

    if($name != "" && $slug != "" && $description != "")
    {
    $equipment = mysqli_real_escape_string($con, $_POST['equipment']);
        $insert_query = "INSERT INTO products (`name`, `description`, `slug`, `admin_note`, `sales_price`, `inventory`, `vin_number`, `status`, `is_sold`, `on_sale`, `bullet_proof`, `image`, `primary_category_id`, `machine_condition`, `auction_scope`, `certified`, `make`, `model`, `manufacture_year`, `machine_current_location`, `country`, `state`, `horsepower`, `weight`, `length`, `width`, `mileage`, `drive`, `number_of_speed`, `suspension`, `fuel_type`,`engine`, `lift_capacity`, `lift_height`, `type_of_neck`, `floor_type`,`retail_contact_name`,`phone`,`location`,`cab`,`transmission`,`transmission_type`,`axle`,`composition`,`liftgate`,`extendable`,`equipment`,`serial`,`drive_type`,`listing_type`,`rops_type`) VALUES ('$name','$description','$slug','$admin_note','$sales_price','$inventory','$vin_number','$status','$is_sold','$on_sale','$bullet_proof','$filename','$primary_category_id','$machine_condition','$auction_scope','$certified','$make','$model','$manufacture_year','$machine_current_location','$country','$state','$horsepower','$weight','$length','$width','$mileage','$drive','$number_of_speed','$suspension','$fuel_type','$engine','$lift_capacity','$lift_height','$type_of_neck','$floor_type','$retail_contact_name','$Phone','$location','$cab','$transmission','$transmission_type','$axie','$composition','$liftgate','$extendable','$equipment','$serial','$drive_type','$listing_type','$rops_type')";

        $inser_query_run = mysqli_query($con,$insert_query);
        $insert_query_two = "INSERT INTO product_listing (`user_id`,`category_id`,`product_ids`) VALUES ('$user_id','$primary_category_id','$con->insert_id')";
        $inser_query_run_two = mysqli_query($con,$insert_query_two);
        if($inser_query_run)
        {
            $product_id = $con->insert_id;
            $query = "INSERT INTO product_images (product_id, product_image,image_type,priority) VALUES ";
            foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
                if ($_FILES["image"]["error"][$key] == 0) {

                    $current_timestamp = strtotime("now");
                    $target_dir = "../uploads/"; 
                    $filename =  basename($_FILES["image"]["name"][$key]) ;
                    $newfileName = str_replace(' ', '&', $filename); 
                    $new_updated_file_name =  $current_timestamp.$newfileName;                         
                    $target_file = $target_dir.$new_updated_file_name;
                    $ext=pathinfo($filename,PATHINFO_EXTENSION);
                        if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $target_file)) {
                            if($key == 0){
                                $entervalue = "1";
                            }else{
                                $entervalue = "0";
                            }
                            $query .= "('{$product_id}', '{$new_updated_file_name}','{$ext}','{$entervalue}'),";
                        } 
                    }
        
                }
            // }
            $finalquery = rtrim($query, ',');
            $successQuery = mysqli_query($con,$finalquery);
            if($successQuery) {
                redirect("createProducts.php", "Product Created Successfully");
            } else {
                // If file move fails, display detailed error information
                $error_message = "Error Moving Uploaded File: ";
                redirect("createProducts.php", $error_message);
            }
        }
        else 
        {
            redirect("createProducts.php", "Something Went Wrong");
        }
    }
    else 
    {
        redirect("createProducts.php", "All Fields are Mandatory");
    }

}
if(isset($_POST['updateProductsSubmit'])){
    $user_id = mysqli_real_escape_string($con, $_SESSION['auth_user']['id']);
    $product_id = mysqli_real_escape_string($con, $_POST['productId']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $admin_note = mysqli_real_escape_string($con, $_POST['admin_note']);
    $sales_price = mysqli_real_escape_string($con, $_POST['sales_price']);
    $inventory = mysqli_real_escape_string($con, $_POST['inventory']);
    $vin_number = mysqli_real_escape_string($con, $_POST['vin_number']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $is_sold = mysqli_real_escape_string($con, $_POST['is_sold']);
    $on_sale = mysqli_real_escape_string($con, $_POST['on_sale']);
    $bullet_proof = mysqli_real_escape_string($con, $_POST['bullet_proof']);

    $primary_category_id = mysqli_real_escape_string($con, $_POST['primary_category_id']);
    $machine_condition = mysqli_real_escape_string($con, $_POST['machine_condition']);
    $auction_scope = mysqli_real_escape_string($con, $_POST['auction_scope']);
    $certified = mysqli_real_escape_string($con, $_POST['certified']);
    $make = mysqli_real_escape_string($con, $_POST['make']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $manufacture_year = mysqli_real_escape_string($con, $_POST['manufacture_year']);
    $machine_current_location = mysqli_real_escape_string($con, $_POST['machine_current_location']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $horsepower = mysqli_real_escape_string($con, $_POST['horsepower']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $length = mysqli_real_escape_string($con, $_POST['length']);
    $width = mysqli_real_escape_string($con, $_POST['width']);
    $mileage = mysqli_real_escape_string($con, $_POST['mileage']);
    $drive = mysqli_real_escape_string($con, $_POST['drive']);
    $number_of_speed = mysqli_real_escape_string($con, $_POST['number_of_speed']);
    $suspension = mysqli_real_escape_string($con, $_POST['suspension']);
    $fuel_type = mysqli_real_escape_string($con, $_POST['fuel_type']);
    $engine = mysqli_real_escape_string($con, $_POST['engine']);
    $sleeper_type = mysqli_real_escape_string($con, $_POST['sleeper_type']);//new
    $lift_capacity = mysqli_real_escape_string($con, $_POST['lift_capacity']);
    $lift_height = mysqli_real_escape_string($con, $_POST['lift_height']);
    $type_of_neck = mysqli_real_escape_string($con, $_POST['type_of_neck']);
    $floor_type = mysqli_real_escape_string($con, $_POST['floor_type']);
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));
    $image_names = mysqli_real_escape_string($con, $_POST['image_name']);

    $retail_contact_name = mysqli_real_escape_string($con, $_POST['retail_contact_name']);
    $Phone = mysqli_real_escape_string($con, $_POST['Phone']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $cab = mysqli_real_escape_string($con, $_POST['cab']);
    $transmission = mysqli_real_escape_string($con, $_POST['transmission']);
    $transmission_type = mysqli_real_escape_string($con, $_POST['transmission_type']);
    $axie = mysqli_real_escape_string($con, $_POST['axie']);
    $composition = mysqli_real_escape_string($con, $_POST['composition']);
    $liftgate = mysqli_real_escape_string($con, $_POST['liftgate']);
    $extendable = mysqli_real_escape_string($con, $_POST['extendable']);
    $equipment = mysqli_real_escape_string($con, $_POST['equipment']);
    $serial = mysqli_real_escape_string($con, $_POST['serial']);
    $drive_type = mysqli_real_escape_string($con, $_POST['drive_type']);
    $listing_type = mysqli_real_escape_string($con, $_POST['listing_type']);
    $rops_type = mysqli_real_escape_string($con, $_POST['rops_type']);


    $query_update = "UPDATE products SET name ='$name', description='$description', slug='$slug', admin_note='$admin_note', sales_price='$sales_price', inventory='$inventory', vin_number='$vin_number', status='$status', is_sold='$is_sold', on_sale='$on_sale', bullet_proof='$bullet_proof', primary_category_id='$primary_category_id', machine_condition='$machine_condition', auction_scope='$auction_scope', certified='$certified', make='$make', model='$model', manufacture_year='$manufacture_year', machine_current_location='$machine_current_location', country='$country', state='$state', horsepower='$horsepower', weight='$weight', length='$length', width='$width', mileage='$mileage', drive='$drive', number_of_speed='$number_of_speed', suspension='$suspension', fuel_type='$fuel_type',engine='$engine',sleeper_type ='$sleeper_type',lift_capacity='$lift_capacity', lift_height='$lift_height', type_of_neck='$type_of_neck', floor_type='$floor_type',retail_contact_name = '$retail_contact_name',phone = '$Phone',location='$location',cab='$cab',transmission='$transmission',transmission_type ='$transmission_type',axle='$axie',composition = '$composition',liftgate = '$liftgate',extendable = '$extendable',equipment = '$equipment',serial ='$serial',drive_type = '$drive_type',listing_type = '$listing_type',rops_type = '$rops_type', updated_at= '$updated_at' WHERE id ='$product_id'";

    $inser_query_run = mysqli_query($con,$query_update);
    if($inser_query_run){
       $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));

       $query_update_two = "UPDATE product_listing SET category_id='$primary_category_id', updated_at= '$updated_at' WHERE product_ids ='$product_id'";
       $inser_query_run_two = mysqli_query($con,$query_update_two);

       if($inser_query_run_two){
           $delete_query = "DELETE FROM product_images WHERE product_id = '$product_id'";
           $delete_query_run = mysqli_query($con, $delete_query);

           if(empty($_FILES['image']['name'][0])){

               $imagesnameArr = explode(',',$image_names);
               $query = "INSERT INTO product_images (product_id, product_image,image_type,priority) VALUES ";

               foreach($imagesnameArr as $key=>$value){
                   $image_updated_name = trim($value);
                   $ext=pathinfo($image_updated_name,PATHINFO_EXTENSION);
                   if($key == 0){
                       $entervalue = "1";
                   }else{
                       $entervalue = "0";
                   }
                   $query .= "('{$product_id}', '{$image_updated_name}','{$ext}','{$entervalue}'),";
               }

               $finalquery = rtrim($query, ',');
               $successQuery = mysqli_query($con,$finalquery);
               if($successQuery) {
                   redirect("viewProduct.php", "Product updated Successfully");
               } else {                            
                   $error_message = "Error uploading Products Images File: ";
                   redirect("viewProduct.php", $error_message);
               }
            }else{
               $query = "INSERT INTO product_images (product_id, product_image,image_type,priority) VALUES ";
               foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
                   if ($_FILES["image"]["error"][$key] == 0) {
   
                       $current_timestamp = strtotime("now");
                       $target_dir = "../uploads/"; 
                       $filename =  basename($_FILES["image"]["name"][$key]) ;
                       $newfileName = str_replace(' ', '&', $filename); 
                       $new_updated_file_name =  $current_timestamp.$newfileName;                         
                       $target_file = $target_dir.$new_updated_file_name;
                       $ext=pathinfo($filename,PATHINFO_EXTENSION);
                           if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $target_file)) {
                               if($key == 0){
                                   $entervalue = "1";
                               }else{
                                   $entervalue = "0";
                               }
                               $query .= "('{$product_id}', '{$new_updated_file_name}','{$ext}','{$entervalue}'),";
                           } 
                       }
           
                   }
               // }
               $finalquery = rtrim($query, ',');
               $successQuery = mysqli_query($con,$finalquery);
               if($successQuery) {
                   redirect("viewProduct.php", "Product updated Successfully");
               } else {                            
                   $error_message = "Error uploading Products Images File: ";
                   redirect("viewProduct.php", $error_message);
               }
            }
           redirect("viewProduct.php", "Menu update Succcessfully");

       }else{
           redirect("viewProduct.php", "product Not updated Succcessfully !");
       }
    }else{
        redirect("viewProduct.php", "product Not updated Succcessfully");
    }
}


// create Catgeory 
if(isset($_POST['createCategorySubmit'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $cat_h1 = mysqli_real_escape_string($con, $_POST['cat_h1']);
    $cat_h2  = mysqli_real_escape_string($con, $_POST['cat_h2']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $shortDescription = mysqli_real_escape_string($con, $_POST['shortdescription']);
    $displayType = mysqli_real_escape_string($con, $_POST['dsiplay_type']);
    $priority = mysqli_real_escape_string($con, $_POST['Priority']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $related_search = mysqli_real_escape_string($con, $_POST['createCategorySubmit']);

   if($name != "" && $slug != "" && $description != ""){
        if(!empty($_FILES["image"]["tmp_name"])){
           $current_timestamp = strtotime("now");
           $target_dir = "../uploads/"; 
           $filename =  basename($_FILES["image"]["name"]);
           $newfileName = str_replace(' ', '&', $filename);
           $updatedFileName = $current_timestamp."-".$newfileName;
           $target_file = $target_dir.$updatedFileName;
           
           if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
               $filenamebanner =  basename($_FILES["image_banner"]["name"]);
               $newfileNamebanner = str_replace(' ', '&', $filenamebanner);
               $updatedFileNameBanner = $current_timestamp."-".$newfileNamebanner;
               $target_file_banner = $target_dir.$updatedFileNameBanner;
               if (move_uploaded_file($_FILES["image_banner"]["tmp_name"], $target_file_banner)) {
                   $insert_query_category = "INSERT INTO category (`name`,`slug`,`category_h1`,`category_h2`,`priority`,`display_type`,`description`,`short_description`,`related_searches`,`category_image`,`category_banner_image`,`status`) VALUES ('$name','$slug','$cat_h1','$cat_h2','$priority','$displayType','$description','$shortDescription','$related_search','$updatedFileName','$updatedFileNameBanner','$status')";

                   $inser_query_run_cat = mysqli_query($con,$insert_query_category);
                   if($inser_query_run_cat){
                       redirect("createCategory.php", "Category Created Succcessfully");
                   }else{
                       redirect("createCategory.php", "Please try Again");
                   }
               }else{
                   redirect("createCategory.php", "Banner Image Not Uploaded Successfully");
               }
           }else{
               redirect("createCategory.php", "Category Image Not Uploaded Successfully");
           }
        }else{
           redirect("createCategory.php", "Please upload Category Image");
        }
   }
   else 
   {
       redirect("createCategory.php", "All Fields are Mandatory");
   }

}

elseif(isset($_POST['updateCategorySubmit']))
{
   $categroy_id = mysqli_real_escape_string($con, $_POST['cat_id']);
   $name = mysqli_real_escape_string($con, $_POST['name']);
   $slug = mysqli_real_escape_string($con, $_POST['slug']);
   $cat_h1 = mysqli_real_escape_string($con, $_POST['cat_h1']);
   $cat_h2  = mysqli_real_escape_string($con, $_POST['cat_h2']);
   $description = mysqli_real_escape_string($con, $_POST['description']);
   $shortDescription = mysqli_real_escape_string($con, $_POST['shortdescription']);
   $displayType = mysqli_real_escape_string($con, $_POST['dsiplay_type']);
   $priority = mysqli_real_escape_string($con, $_POST['Priority']);
   $status = mysqli_real_escape_string($con, $_POST['status']);
   $related_search = mysqli_real_escape_string($con, $_POST['related_search']);
   $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));

   if(!empty($_FILES["image"]["tmp_name"])){
       $current_timestamp = strtotime("now");
       $target_dir = "../uploads/"; 
       $filename =  basename($_FILES["image"]["name"]);
       $newfileName = str_replace(' ', '&', $filename);
       $updatedFileName = $current_timestamp."-".$newfileName;
       $target_file = $target_dir.$updatedFileName;
       move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
   }
   if(!empty($_FILES["image_banner"]["tmp_name"])){
       $current_timestamp = strtotime("now");
       $target_dir = "../uploads/"; 
       $filenamebanner =  basename($_FILES["image_banner"]["name"]);
       $newfileNamebanner = str_replace(' ', '&', $filenamebanner);
       $updatedFileNameBanner = $current_timestamp."-".$newfileNamebanner;
       $target_file_banner = $target_dir.$updatedFileNameBanner;
       move_uploaded_file($_FILES["image_banner"]["tmp_name"], $target_file_banner);
   }

   $query_update_category = "UPDATE category SET  `name`='$name',`slug`='$slug',`category_h1`='$cat_h1',`category_h2`='$cat_h2',`description`='$description',`short_description`='$shortDescription',`display_type`='$displayType',`priority`='$priority',`related_searches`='$related_search',`status`='$status', updated_at ='$updated_at'";
   if($target_file){
       $query_update_category .= ",`category_image`='{$updatedFileName}'";
   }
   if($target_file_banner){
       $query_update_category .= ",`category_banner_image`='{$updatedFileNameBanner}'";
   }
   $query_update_category .= " WHERE id ='$categroy_id'";
   // echo "yaman walia";
   // print_r($query_update_category);die;

   $query_update_run_cat = mysqli_query($con, $query_update_category);

   if($query_update_run_cat)
   {
       redirect("viewCategory.php", "Category Updated Succcessfully");
   }
   else
   {
       redirect("viewCategory.php", "Something Went Wrong");
   }

}
if(isset($_POST['createMenuSubmit'])){
    $name = mysqli_real_escape_string($con, $_POST['menuname']);
    $link = mysqli_real_escape_string($con, $_POST['menulink']);
    $insert_query = "INSERT INTO header_menu (`menu_title`,`menu_link`) VALUES ('$name','$link')";
    $inser_query_run = mysqli_query($con,$insert_query);
    if($inser_query_run){
        redirect("navMenu.php", "Menu created Succcessfully");
    }else{
        redirect("navMenu.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['updatemenulink']))
{
    $id = mysqli_real_escape_string($con, $_POST['menuID']);
    $name = mysqli_real_escape_string($con, $_POST['updatemenuname']);
    $link = mysqli_real_escape_string($con, $_POST['updatemenulink']);
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));
    $query_update = "UPDATE header_menu SET menu_title='$name', menu_link='$link', updated_at= '$updated_at' WHERE id ='$id'";
    $inser_query_run = mysqli_query($con,$query_update);
    if($inser_query_run){
        redirect("navMenu.php", "Menu update Succcessfully");
    }else{
        redirect("navMenu.php", "Something Went Wrong");
    }
}

// Common Pages 
if (isset($_POST['createCommonPagesSubmit']))
{
    $page_title = mysqli_real_escape_string($con, $_POST['page_title']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $template = mysqli_real_escape_string($con, $_POST['template']);
    $page_content = mysqli_real_escape_string($con, $_POST['page_content']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $insert_query = "INSERT INTO common_pages (`page_title`,`slug`,`template`,`page_content`,`status`) VALUES ('$page_title','$slug','$template','$page_content','$status')";
    $inser_query_run = mysqli_query($con,$insert_query);
    if($inser_query_run){
        redirect("commonPages.php", "Common Page created Succcessfully");
    }else{
        redirect("commonPages.php", "Something Went Wrong");
    }
}
elseif(isset($_POST['updateCommonPagesSubmit']))
{
    $page_title = mysqli_real_escape_string($con, $_POST['page_title']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $template = mysqli_real_escape_string($con, $_POST['template']);
    $page_content = mysqli_real_escape_string($con, $_POST['page_content']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $updated_at = mysqli_real_escape_string($con,date("Y-m-d H:i:s" ));
    $userId = mysqli_real_escape_string($con, $_POST['userId']);

    $query_update = "UPDATE common_pages SET page_title='$page_title', slug='$slug', template='$template', page_content='$page_content', status='$status', updated_at= '$updated_at' WHERE id ='$userId'";
    $inser_query_run = mysqli_query($con,$query_update);
    if($inser_query_run){
        redirect("commonPages.php", "Common Page update Succcessfully");
    }else{
        redirect("commonPages.php", "Something Went Wrong");
    }

}