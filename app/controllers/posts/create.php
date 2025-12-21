<?
require_once MODELS."/Validator.php";
$title = $header ="Create a new post";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
  //   dd($_POST);
     $fillable =['title','descr','content'];
     $data = get_request_data($fillable);
   
// правила валидации
$rules=[
    'title'=>[
    'required'=> true,
    'min'=>3,
    'max'=>5
    ],
    'descr'=>[
    'required'=> true,
    'min'=>3,
    'max'=>5
    ],
    'content'=>[
    'required'=> true,
    'min'=>5
    ]
];

$validator = new Validator();
 $validation = $validator->validate($data,$rules);

 //dump($validation->errors);


}
require_once V_POSTS."/create.tmpl.php";