<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 03.05.19
 * Time: 15:12
 */

namespace app\forms;

use app\models\User;

class RegisterForm extends User
{
    public $first_name;
    public $last_name;
    public $phone;
    public $address;
    public $comment;
    public $step;
}