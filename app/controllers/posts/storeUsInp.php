
<?
global $db;
require_once MODELS."/Validator.php";
     $fillable =['email','password']; //,'confirm_pass'
     $data = get_request_data_1($fillable);
  //dd ($data);
// правила валидации
$rules=[
    'email'=>[
    'required'=> true, 
    'email'=> true
    ],
    'password'=>[
    'required'=> true,
    'min'=> 5,
    'max'=> 400 
    ]
];

$pass= (string) $data["password"];

$validator = new Validator();
 $validation = $validator->validate($data,$rules);

  

  if (empty($validation->getErrors())) {
  //dd($validation->getErrors()); // видим ошибки
  
 // echo "<H3 > $pass </H3>";  //видим пароль
  //$sql = "SELECT * FROM `users` WHERE `email` =?  ";


//dd($data['email']);


  $sql = "SELECT  `password` FROM `users` WHERE `email` = ?";
  $db->query($sql,[$data['email']]);
       if($db->rowCount()){ 
               $rezult= $db->getColumn();
                  echo "<H3 > $rezult </H3>";
                    $verify = password_verify($pass, $rezult);  
                    if ($verify) {
                    echo "<H3 style = 'color:green;'> You have entered </H3>";
                    }
   //                 redirect(url:"posts/inp"); 

        //              echo "<H3 style = 'color:green;'> You have entered </H3>";

                                                       
        redirect(url:"");    
       } 
        
         else echo "<H3 style = 'color:green;'> Нет у нас такого пользователя </H3>";
//      //dump("SUCCESS");
                                      

  }

      

require_once V_POSTS."/create.tmpl02.php";

 
