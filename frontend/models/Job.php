<?php

namespace frontend\models;

use common\models\Category;
use common\models\User;
use Yii;

/**
 * This is the model class for table "jobs".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $company_id
 * @property string|null $location
 * @property int|null $categories_id
 * @property string|null $tags
 * @property string|null $description
 * @property string|null $email
 * @property string|null $closing_date
 * @property int|null $user_id
 * @property string $updated_at
 * @property string|null $created_at
 *
 * @property Category $categories
 * @property JobApplication[] $jobApplications
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
            [['company_id', 'categories_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['closing_date', 'updated_at', 'created_at'], 'safe'],
            [['title', 'location', 'tags', 'email'], 'string', 'max' => 255],
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
            'company_id' => 'Company ID',
            'location' => 'Location',
            'categories_id' => 'Categories ID',
            'tags' => 'Tags',
            'description' => 'Description',
            'email' => 'Email',
            'closing_date' => 'Closing Date',
            'user_id' => 'User ID',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
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
     * Gets query for [[JobApplications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobapplication()
    {
        return $this->hasMany(JobApplication::class, ['job_id' => 'id']);
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

    public function getReviewuser()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])
            ->via('jobApplications');
    }
}
