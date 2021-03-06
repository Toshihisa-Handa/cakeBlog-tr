<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

 public function validationDefault(Validator $validator)
    {
        $validator
            // ->notEmpty('title') //コンソールで「'notEmpty' is deprecated.」とnotEmptyは非推奨ですと表示されるのでnotBlankを使用
            ->notBlank('title')
            ->requirePresence('title')
            ->notBlank('body')
            ->requirePresence('body');

        return $validator;
    }



}