<?php
declare(strict_types=1);

namespace backend\components\rbac;

use yii\db\Query;
use yii\rbac\Item;
use yii\rbac\Rule;

class DbManager extends \yii\rbac\DbManager
{

    /**
     * Executes the rule associated with the specified auth item.
     *
     * If the item does not specify a rule, this method will return true. Otherwise, it will
     * return the value of [[Rule::execute()]].
     *
     * @param string|int $user the user ID. This should be either an integer or a string representing
     * the unique identifier of a user. See [[\yii\web\User::id]].
     * @param Item $item the auth item that needs to execute its rule
     * @param array $params parameters passed to [[CheckAccessInterface::checkAccess()]] and will be passed to the rule
     * @return bool the return value of [[Rule::execute()]]. If the auth item does not specify a rule, true will be returned.
     * @throws InvalidConfigException if the auth item has an invalid rule.
     */
    protected function executeRule($user, $item, $params=[])
    {
        $row = (new Query())->select(["data"])
            ->from($this->ruleTable)
            ->where(['name' => $item->name])
            ->one($this->db);
        if (!empty($row)) {
            $params['url'] = $row['data'];
        }

        $rule = new AccessRule();
        if ($rule instanceof Rule) {
            return $rule->execute($user, $item, $params);
        }

        return false;
    }
}
