<?php

namespace frontend\modules\pcc\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use frontend\modules\pcc\models\Province;
use frontend\modules\pcc\models\Ampur;
use frontend\modules\pcc\models\Tambon;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $prename
 * @property string $name
 * @property string $lname
 * @property string $birth
 * @property integer $age
 * @property string $addr
 * @property string $moo
 * @property string $prov_code
 * @property string $amp_code
 * @property string $tmb_code
 * @property string $lat
 * @property string $lon
 * @property string $rapid
 * @property string $created_by
 * @property string $updated_by
 * @property string $created_at
 * @property string $update_at
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','lname'],'required'],
            [['birth'], 'safe'],
            [['age'], 'integer'],
            [['prename'], 'string', 'max' => 30],
            [['name', 'lname', 'addr', 'lat', 'lon', 'rapid', 'created_by', 'updated_by', 'created_at', 'update_at'], 'string', 'max' => 255],
            [['moo', 'prov_code', 'amp_code', 'tmb_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prename' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'birth' => 'วันเกิด',
            'age' => 'อายุ',
            'addr' => 'ที่อยู่',
            'moo' => 'หมู่',
            'prov_code' => 'จังหวัด',
            'amp_code' => 'อำเภอ',
            'tmb_code' => 'ตำบล',
            'lat' => 'Lat',
            'lon' => 'Lon',
            'rapid' => 'Rapid',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }
    public function behaviors() {
        return[
            ['class'=>  TimestampBehavior::className(),
                'value'=> new Expression('NOW()')
                ],
            
            ['class'=>  BlameableBehavior::className()]
                
        ];
    }
// join
public function getProvince(){
    return $this->hasOne(Province::className(),[
        'changwatcode'=>'prov_code'
        
    ]);
 }
 public function getAmpur(){
     return $this->hasOne(Ampur::className(),[
         'ampurcodefull'=>'amp_code'
     ] );
     
 }
  public function getTambon(){
     return $this->hasOne(Tambon::className(),[
         'tamboncodefull'=>'tmb_code'
     ] );
     
 }
 
}