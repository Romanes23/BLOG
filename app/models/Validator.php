<?
class Validator{
//public $errors = [];  //Это временно
private $errors = [];

//===========================  Добавить емал and match
private $validator_list = ['required','min' ,'max','email', 'match'];
private $messages = [
                    'required' => "The :fildname: field is required",
                    'min' => "The :fieldname: field must be more then :rulevalue: characters ",
                    'max' => "The :fieldname: field must be less then :rulevalue: characters ",
                    'email' => " Field must be an email ",
                    'match' => "The :fieldname: field must match with :rulevalue: fields "
                    ];

private $data =[];
public function validate($data=[],$rules=[] ){
$this->data=$data; // данные 'confirm_pass' нужно пересохан. тк 
    foreach ($data as $key => $value) {
       if (in_array($key, array_keys($rules))) {
       $this->checkAndValidate([
            'fieldname'=>$key,
            'value'=>$value,
            'rules'=>$rules[$key],  ]); }

        }
    return $this;
}

private function checkAndValidate($field){
        foreach ($field['rules'] as $rule => $rule_value) {
            if(in_array($rule,$this->validator_list)){
                    if (!call_user_func_array([$this, $rule], [$field['value'], $rule_value]  )) {
                            $this->addError(
                            $field['fieldname'],
                            str_replace(
                                             [':fieldname:', ":rulevalue:"] , 
                                            [$field['fieldname'], $rule_value], 
                                            $this->messages[$rule])  );
                    }
            }
        }
}

// validators
private function addError($fieldname,$error){
   $this->errors[$fieldname][] = $error;  
    }
public function getErrors(){return $this->errors;}

private function required($value, $rule_value){
    return !empty($value);
}

private function min($value, $rule_value){
    return len($value)>$rule_value;
}

private function max($value, $rule_value){
    return len($value)<$rule_value;
}

private function email($value, $rule_value){
    return filter_var($value, FILTER_VALIDATE_EMAIL);
}

// в кач $value буд ключ 'confirm_pass', $rule_value буд ключ confirm те нужно не просто название колонки, а достать из нее значение
// а его в момент обработки нет, след нужно пересохранять данные $data
private function match($value, $rule_value){
    return $value===$this->data[$rule_value];
   
} //$value дс с массивом $this->data с ключом [$rule_value]

// т.к. listErrors принадл классу Validator, запускается ч/з $validation в create.php

public function listErrors($fieldname){
    $errors_list ="";
        if (isset( $this->errors[$fieldname])){ 
            $errors_list = "<div class='invalid-feedback d-block'><ul class='list-unstyled'>";
            foreach ( $this->errors[$fieldname] as $error){
                    $errors_list .= "<li>$error</li>"; 
            }
            $errors_list.= "</ul></div>";
        }
return $errors_list;

}






}