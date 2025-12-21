<?
class Validator{
//public $errors = [];  //Это временно
private $errors = [];
private $validator_list = ['required','min' ,'max'];
private $messages = [
                    'required' => "The :fildname: field is required",
                    'min' => "The :fieldname: field must be :rulevalue: characters ",
                    'max' => "The :fieldname: field must be :rulevalue: characters ",
                    ];

public function validate($data=[],$rules=[] ){

    foreach ($data as $key => $value) {
       if (in_array($key, array_keys($rules))) {
       $this->checkAndValidate([
            'fieldname'=>$key,
            'value'=>$value,
            'rules'=>$rules[$key],  ]); } }
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
    return len($value)>=$value;
}

private function max($value, $rule_value){
    return len($value)<=$value;
}



}