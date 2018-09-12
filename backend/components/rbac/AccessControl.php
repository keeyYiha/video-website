<?php
declare(strict_types=1);

namespace backend\components\rbac;

use Yii;
use yii\web\ForbiddenHttpException;

class AccessControl extends \yii\filters\AccessControl
{
    public function beforeAction($action)
    {
        $user = $this->user;
        $request = Yii::$app->getRequest();
        /* @var $rule AccessRule */
        foreach ($this->rules as $rule) {
            if ($allow = $rule->allows($action, $user, $request)) {
                return true;
            }
        }

        // echo $action->getUniqueId()."\n";
        // echo $action->controller->getUniqueId()."\n";
        // echo $action->controller->module->getUniqueId()."\n";

        $dbMgr = new DbManager();

        $userId = $user->getId();
        $roles = $dbMgr->getRolesByUser($userId);
        $deny = false;
        foreach ($roles as $key => $value) {
            if ($user->can($key, ['action' => $action])) {
                $deny = true;
                break;
            }
        }

        if (!$deny) {
            $this->denyAccess($user);
        }

        return $deny;
    }

    protected function denyAccess($user)
    {
        if ($user !== false && $user->getIsGuest()) {
            $user->loginRequired();
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }
}