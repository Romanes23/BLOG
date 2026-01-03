<!-- <H5> HELLO functions.php </H5> -->
<?
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



//=================================  Это для записи в файл ==========================================
function validate($username, $email, $password, $password_confirm)
{
    $errors = [];

    if (empty($username) || empty($email) || empty($password) || empty($password_confirm)) {
        $errors[] = "All filds must be filled";
        //echo "All filds must be filled";
    };
    if ($password !=  $password_confirm) {
        $errors[] = "Characters 'password' and 'confirm' filds aren't equally";
    };
    if (mb_strlen($username) < 3 && mb_strlen($username) > 15) {
        // echo "The number of characters in the  name field should be from 3 to 15   ";
        $errors[] = "The number of characters in the  name field should be from 3 to 15   ";
    };
    if (mb_strlen($password) < 3 && mb_strlen($password) > 30) {
        // echo "Characters password and confirm filds aren't equally";
        $errors[] = "The number of characters in the  password field should be from 5 to 30   ";
    };

    $db = "pages/users1.txt";
    $file = fopen($db, "a+");
    if (empty($errors)) {
        while ($line = fgets($file)) {
            $line = trim($line);
            if (empty($line)) continue;
            $parts = explode(":", $line, 3);
            // d2($parts);
            if (count($parts) >= 2) {
                $storedEmail = $parts[1];
                if ($storedEmail === $email) {
                    $errors[] = "Emaile already exists";
                    //                   fclose($file);
                    break;
                };
            }
        }

        // while (!feof($file)) {
        //     $line = fgetc($file);
        //     $devider = strpos($line, ":");
        //     $readedName = substr($line, $devider);
        //     if ($readedName == $username) {
        //         $errors[] = "Польщователь с таким именем уже существует ";
        //     }
        // }
    };

    if (empty($errors)) {
        $line = $username . ":" . $email . ":" . password_hash($password, algo: PASSWORD_DEFAULT) . "\n";
        fwrite($file, $line);
    }
    fclose($file);

    return $errors;
}
//=================================  Это для записи в файл ==========================================

// upload -----------------------------------------------------------------------------------------
function uploadFile($name)
{
    $rezult = '';
    if ($_FILES[$name]['error'] != 0) {
        $rezult = "Error: " . $_FILES[$name]['error'];
        return $rezult;
    }
    if (
        is_uploaded_file($_FILES[$name]['tmp_name']) &&
        move_uploaded_file($_FILES[$name]['tmp_name'], to: 'images/' . $_FILES[$name]['name'])
    ) {
        $rezult = " File uploaded successfully";
    } else  $rezult = " File not uploaded ";
    return  $rezult;;
};




function len($str)
{
    return (mb_strlen($str, "UTF-8"));
}
function d1($data): void
{
    echo "<pre>"; //для включения в документ предварительно отформатированного текста
    var_dump(value: $data);
    echo "/<pre>";
}
//Функция с типом never либо выбрасывает исключение, либо вызывает конструкцию языка exit()
function d2($data): never
{
    var_dump(value: $data);
    die; //exit
}
?>