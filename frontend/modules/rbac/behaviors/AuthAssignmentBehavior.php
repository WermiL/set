<?php

namespace frontend\modules\rbac\behaviors;


use frontend\modules\rbac\models\records\RbacAuthAssignment;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Auth Assignment Behavior.
 */
class AuthAssignmentBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
        ];
    }

    public function afterInsert($event)
    {
        if (is_object($this->owner)) {
            if ($this->owner::className() === 'frontend\modules\user\models\records\user\User') {
                $rbacAuthAssignment = new RbacAuthAssignment();
                $rbacAuthAssignment->item_name = $this->owner::ROLE_USER;
                $rbacAuthAssignment->user_id = (string)$this->owner->id;
                $rbacAuthAssignment->created_at = time();
                $rbacAuthAssignment->validate();
                $rbacAuthAssignment->save();
            }
        }
    }
}
