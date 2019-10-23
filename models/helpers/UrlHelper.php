<?php

namespace app\models\helpers;

use Yii;

class UrlHelper
{
    public static function generateUrl($filename, $extension, $glue = '_', $security = false)
    {
        $filename = preg_replace('/\s+/', $glue, trim(preg_replace('/[^0-9a-z]/i', ' ', strtolower($filename))));
        if ($security) {
            $random = substr(Yii::$app->security->generateRandomString(), 0, 10);
            $filename .= '_' . $random;
        }
        return $filename . '.' . $extension;
    }
}