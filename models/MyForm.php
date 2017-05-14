<?php


namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class MyForm extends Model
{
	public $email;
	public $name;
	
	
	public function rules (){
		return [
			[['name', 'email'], 'required'],
			['email', 'email', 'message' => 'Некорректный Емаил']
		];
	}
}




?>