<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Session;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {

        $this->layout = 'homePage';
        if (\Yii::$app->user->isGuest)
            return $this->redirect(['site/login']);
        else {
            $isUser = Yii::$app->session->get('user_id');
            $roleuser = \Yii::$app->authManager->getRolesByUser($isUser);
            // $roleuser = Yii::$app->user->identity->role;
            //$roleGet = \Yii::$app->authManager->getRole();
            //$nameRole = $roleuser->ruleName;
            //print_r($roleuser->name);//->getRole();
            foreach ($roleuser as $rolefore) {
                $namerole = $rolefore->name;
            }

            if ($namerole == 'SupportVIO') {
                return $this->render('support-dashboard');
            } else if ($namerole == 'SupportVIN') {
                return $this->render('support-vin-dashboard');
            } else if ($namerole == 'SupportVIS') {
                return $this->render('support-viS-dashboard');
            } else {
                return $this->render('admin-dashboard');
            }
        }
    }

    public function actionLogin() {
        //Guest -> ยังไม่เป็น Login
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            $log = User::find()->where(['username' => $_POST['LoginForm']['username'], 'status' => 10])->one();
            //ถ้า username ไม่ถูกต้องให้ Alert
            if (empty($log)) {
                \Yii::$app->session->setFlash('loginError', '<i class="fa fa-warning"></i><b> username or password. ไม่ถูกต้อง!</b>');
                return $this->render('login', [
                            'model' => $model
                ]);
            }
            //เอา id ของคนที่ login ผ่าน
            $loginuser = $log['id'];
            $suplogin = User::find()->andWhere(['id' => $loginuser])->one();
            //หา Role จาก id
            $roleuser = \Yii::$app->authManager->getRolesByUser($loginuser);
                foreach ($roleuser as $rolefore) {
                    $namerole = $rolefore->name;
                }
                if($namerole == "SupportVIO")
                    $numRole = 'vio';
                else if($namerole == "SupportVIN")
                    $numRole = 'vin';
                else if($namerole == "SupportVIS")
                    $numRole = 'vis';
                else 
                    $numRole = 'admin';
                
            if ($roleuser != null) {
                \Yii::$app->session->set('user_id', $loginuser);
                \Yii::$app->session->set('role_name',  $numRole);
            } else {
                \Yii::$app->session->setFlash('loginError', '<i class="fa fa-warning"></i><b> These Login credentials are Blocked/Deactive by Admin</b>');
                return $this->render('login', ['model' => $model,]);
            }

            if ($model->login())
                return $this->goBack();
            else
                return $this->render('login', ['model' => $model,]);
            // print_r($roleuser);
            // echo "loginPass";
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function getAssignments($userId) {
        if (!Yii::$app->user->isGuest) {
            $assignment = new \yii\rbac\Assignment;
            $assignment->userId = $userId;
            $assignment->roleName = Yii::$app->user->identity->id;
            return [$assignment->roleName => $assignment];
        }
    }

}
