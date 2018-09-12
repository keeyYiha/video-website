<?php
declare(strict_types=1);

namespace backend\components\rbac;

use Yii;

class AccessRule extends \yii\rbac\Rule
{
    public function execute($user, $item, $params)
    {
        $urls   = explode(";", $params['url']);
        $action = $params['action'];

        $request = Yii::$app->getRequest();

        $cUrl = $request->getUrl();

        if (in_array('/*', $urls) or $cUrl == '/') {
            return true;
        }

        do {
            // echo $cUrl."\n";
            if (in_array($cUrl, $urls)) {
                return true;
            }
            
            if (substr($cUrl, -1) == '*') {
                $cUrl = dirname($cUrl);
            }
            $cUrl = dirname($cUrl);
            if ($cUrl == '/')
                break;
            else
                $cUrl = $cUrl . '/*';
        } while (true);

        return false;
    }
}