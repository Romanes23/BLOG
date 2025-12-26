<?
// global $db;
//  require_once MODELS."/Validator.php";
 $title = $header ="Create a new post";
 require_once V_POSTS."/create.tmpl.php";
// if ($_SERVER["REQUEST_METHOD"]==="POST") {
//   //   dd($_POST);
//      $fillable =['title','descr','content'];
//      $data = get_request_data($fillable);
   
// // правила валидации
// $rules=[
//     'title'=>[
//     'required'=> true,
//     'min'=> 5,
//     'max'=> 15
//     ],
//     'descr'=>[
//     'required'=> true,
//     'min'=> 5,
//     'max'=> 15
//     ],
//     'content'=>[
//     'required'=> true,
//     'min'=>5
//     ]
// ];

// //Это для валидации данных пользователя

// // $data= ['email' => 'aaaa@yandex.ru', 
// //         'password'=> 'ndsla',
// //         'confirm_pass'=>'ndsla'];

// //         $rules=[
// //                 'email'=>['required'=> true, 'email'=> true],
// //                 'password'=>['required'=> true,'min'=> 5,'max'=> 15 ],
// //                 'confirm_pass'=>['required'=> true,  'match'=>"password"]
// //         ];







// $validator = new Validator();
//  $validation = $validator->validate($data,$rules);

// //dd($validation->getErrors());

// if (empty($validation->getErrors())) {
//   $sql = "INSERT INTO `posts`(`title`,`descr`,`content`) VALUES(?,?,?)";
//   try {
//     $db->query($sql,[$data['title'], $data['descr'], $data['content']]);
//     // dump("SUCCESS");
//     $_SESSION['success']= "Post created successfully"; // это пока одномерный массив, но можно вот так $_SESSION['success'][] и $_SESSION['danger'][], 
//                                                        // и дальше толкать в конец, что бы сделать несколько сообщений за раз
//     redirect();                                        // но это тянет еще на один еласс
//   } catch (PDOException $e) {
//     $_SESSION['danger']= "Post destroed";            //  $_SESSION['danger'][]

//   //  dump ($e->getMessage());
//   }
// }
 
// // dump($validation->errors);


// }
// 