<?
require_once MODELS."/Validator.php";
$title = $header ="Create a new post";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
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

$data= ['email' => 'aaaa@yandex.ru', 'password'=> 'ndsla', 'confirm_pass'=>'ndsla'];

        $rules=[
                'email'=>['required'=> true, 'email'=> true],
                'password'=>['required'=> true,'min'=> 5,'max'=> 15 ],
                'confirm_pass'=>['required'=> true,  'match'=>"password"]
        ];







$validator = new Validator();
 $validation = $validator->validate($data,$rules);

//dd($validation->getErrors());

if (empty($validation->getErrors())) {
  $sql = "INSERT INTO `posts`(`title`,`descr`,`content`) VALUES(?,?,?)";
  try {
    $db->query($sql,[$data['title'], $data['descr'], $data['content']]);
  dump("SUCCESS");

  } catch (PDOException $e) {
    dump ($e->getMessage());
  }
}
 
// dump($validation->errors);


}
require_once V_POSTS."/create.tmpl.php";