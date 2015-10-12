<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;
use yii\web\JsExpression;
use yii\web\Controller;
use Yii;

use common\models\ComputerVih;
use common\models\Software;
use common\models\SummaryOnSite;
/**
 * Description of DefaultController
 *
 * @author warakorn.p
 */
class DefaultController extends Controller{
    //put your code here
    public function actionIndex(){
        $dataRegTmp = $softwareData = [];
        $comRegStat = ComputerVih::find()->where(['is_status' => 0])->count();
        $comStatusLocal[] = ['name'=>"Default ($comRegStat)", 'y'=>$comRegStat, 'color'=>'#77C730'];
        
        $softwareDataTmp = Software::find()->where(['is_status'=>0])->asArray()->limit(20)->orderBy('software_id DESC')->all();
        
        foreach($softwareDataTmp as $v){
            
        }
    }
}
