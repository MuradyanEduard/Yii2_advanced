<?php

namespace frontend\models;

use backend\models\Category;
use common\models\User;
use Yii;

/**
 * This is the model class for table "jobs".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $Company
 * @property string|null $location
 * @property int|null $categories_id
 * @property string|null $tags
 * @property string|null $Description
 * @property string|null $email
 * @property string|null $closing_date
 * @property int|null $user_id
 *
 * @property Category $categories
 * @property User $user
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categories_id', 'user_id'], 'integer'],
            [['closing_date'], 'safe'],
            [['title', 'Company', 'location', 'tags', 'Description', 'email'], 'string', 'max' => 255],
            [['categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['categories_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'Company' => 'Company',
            'location' => 'Location',
            'categories_id' => 'Categories ID',
            'tags' => 'Tags',
            'Description' => 'Description',
            'email' => 'Email',
            'closing_date' => 'Closing Date',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'categories_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
