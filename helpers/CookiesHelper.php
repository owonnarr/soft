<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 05.05.19
 * Time: 21:18
 */

namespace app\helpers;

use Yii;
use DomainException;

class CookiesHelper
{
    /**
     * @param array $cookies
     * @return bool
     */
    public function addCookie(array $cookies) :bool
    {
        if (!is_array($cookies)) {
            throw new DomainException('Error, first param must have array');
        }

        foreach ($cookies as $key => $value) {
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => $key,
                'value' => $value,
                'expire' => time() + (1 * 24 * 60 * 60)
            ]));
        }

        return true;
    }
}