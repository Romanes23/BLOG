<H3>Registration</H3>
<?
//require_once "posts/regform.php";
//require_once "functions.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = regUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['password_confirm']);

    if (!empty($errors)) {
        $list = "<ul class = 'col-6' style  = 'color:red;'>";
        foreach ($errors as $err) {
            $list .= "<li>$err</li>";
        }
        $list .= "</ul>";
        echo $list;
    } 
    else {  echo "<p class='mt-3 col-6' style ='color:green;'> User registered sucsessfully </p>";    }
    
}



function regUser($username, $email, $password, $password_confirm)
{
    $errors = [];

    $username = trim(htmlspecialchars($username));
    $email = trim(htmlspecialchars($email));
    $password = trim(htmlspecialchars($password));
    $password_confirm = trim(htmlspecialchars($password_confirm));

    $errors = validate_new($username, $email, $password, $password_confirm);
   
    global $conn;   
        if(empty($errors)){
            try {
            $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT)]);

        } 
            catch (PDOException $e) {echo "Something goes wrong ";}
        }

    //d1($errors);
    return $errors;
}

function validate_new($username, $email, $password, $password_confirm){   
     global $conn; 
     $errors = [];
    
   if (empty($username) || empty($email) || empty($password) || empty($password_confirm)) {
        $errors[0] = "All filds must be filled";
        //echo "All filds must be filled";
    };
    if ($password !=  $password_confirm) {
        $errors[1] = "Characters 'password' and 'confirm' filds aren't equally";
    };
    if (mb_strlen($username) < 3 && mb_strlen($username) > 15) {
        // echo "The number of characters in the  name field should be from 3 to 15   ";
        $errors[2] = "The number of characters in the  name field should be from 3 to 15   ";
    };
    if (mb_strlen($password) < 3 && mb_strlen($password) > 30) {
        // echo "Characters password and confirm filds aren't equally";
        $errors[3] = "The number of characters in the  password field should be from 5 to 30   ";
    };


       
       
        $sgl = "SELECT * FROM `users` WHERE `name` =? OR `email` =?";
        $stmt = $conn->prepare($sgl);
        $stmt->execute([$username,$email]);

    if($stmt->rowCount()){
        $errors[4] = "login or email exists already"; 
       
    }
   
    
 return $errors;



    }
