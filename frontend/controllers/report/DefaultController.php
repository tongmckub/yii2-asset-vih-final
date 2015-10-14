<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace frontend\controllers\report;
use yii\web\JsExpression;
use yii\web\Controller;
use Yii;
use yii\widgets\ActiveForm;
use yii\web\Response;
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
        $comRegStat = SummaryOnSite::find()->where(['is_status' => 0])->count();
        $comStatusLocal[] = ['name'=>"Default ($comRegStat)", 'y'=>$comRegStat, 'color'=>'#77C730'];
        
        $softwareDataTmp = Software::find()->where(['is_status'=>0])->asArray()->limit(20)->orderBy('software_id DESC')->all();
        $comStatusDataTmp = \common\models\Location::find()->orderBy('localtion_id')->asArray()->all();
        
        foreach($softwareDataTmp as $v){
            $comSoftwareReg = SummaryOnSite::find()->where(['is_status'=>0,'software_id'=>$v['software_id']])->count();
            $dataRegTmp[] = (int)$comSoftwareReg;
            $softwareData[] = $v['software_name'];
        }
        $comStatusData[] = ['name'=>"ทั้งหมด ($comRegStat)",
                'type'=>'column',
                'data'=>$dataRegTmp,
                'color'=>'#77C730',
            ];
        //print_r($comStatusData); exit();
        //var_dump($comStatusDataTmp); exit();
        
        foreach($comStatusDataTmp as $k=>$sv){
            $dataTmp = [];
            foreach($softwareDataTmp as $v){
                $comSoftwareStat = SummaryOnSite::find()->where(['is_status'=>0,'software_id'=>$v['software_id'],'computer_id'=>$sv['computer_id']])->count();
            
                $dataTmp[] = $comSoftwareStat;
            }
            $comStatusLocalCount = ComputerVih::find()->where(['is_status'=>0, 'computer_localtion'=>$sv['location_id']])->count();
            $comStatusData[] = ['name'=>''."($comStatusLocalCount)",
                    'type'=>'column',
                    'data'=>$dataTmp,
                ];
            $comStatusLocal[] = ['name'=>$sv['computer_localtion'].' ('.$comStatusLocalCount.')',
                'y'=>$comStatusLocalCount,
                'color'=>new JsExpression('Highcharts.getOptions().colors['.($k).']')
                ];
        }
        
        return $this->render('index',[
                        'softwareData' => $softwareData,
                        'comStatusData' => $comStatusData,
                        'comStatusLocal' => $comStatusLocal,
        ]);
    }
}