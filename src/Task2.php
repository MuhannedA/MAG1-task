<?php
// Task 2 - Create a function that returns a user by their ID
function getUserById($database, $userId)
{
    // Prepare the query and bind the user ID parameter
    // Task 2.1 edit the query below to return a user by their ID
    $query = "SELECT * FROM users WHERE id = ?";
    // don't toach following line and don't worry about this line, it just makes the query easier to read
    $query = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $query);

    // Task 1.2 complete the function body to return the users
    // hint: use fetch_assoc to get the result row

    $prepa= $database->prepare($query);
    $prepa->bind_param("i",$userId);
    $result = $prepa->execute();
    if (!$result) {
     die('Query Error (' . $prepa->errno . ') ' . $prepa->error);
 }
 
     $ret = $prepa->get_result();

     return $ret->fetch_assoc();
   
}

//example output of getUsers($database) 1 row
// [
//     'id' => 1,
//     'name' => 'John Doe',
//     'email' => 'john@example.com'
// ]
