<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;

class RbacController extends \yii\console\Controller {

    // public function actionInit(){
    //   Console::output('Yii 2 Learning.');
    // }
//  public function actionInit(){
//    $auth = Yii::$app->authManager;
//    $auth->removeAll();
//    Console::output('Removing All! RBAC.....');
//
//    $rule = new \common\rbac\AuthorRule;
//    $auth->add($rule);
//
//     $index  = $auth->createPermission('blog/index');
//     $auth->add($index);
//     $view   = $auth->createPermission('blog/view');
//     $auth->add($view);
//     $create = $auth->createPermission('blog/create');
//     $auth->add($create);
//     $update = $auth->createPermission('blog/update');
//     $update->ruleName = $rule->name;
//     $auth->add($update);
//     $delete = $auth->createPermission('blog/delete');
//     $auth->add($delete);
//
//    $createPost = $auth->createPermission('createComputer');
//    $createPost->description = 'เพิ่ม Computer';
//    $auth->add($createPost);
//
//    $updateComputer = $auth->createPermission('updateComputer');
//    $updateComputer->description = 'แก้ไข Computer';
//    $auth->add($updateComputer);
//
//    $loginToBackend = $auth->createPermission('loginToBackend');
//    $loginToBackend->description = 'ล็อกอินเข้าใช้งานส่วน backend';
//    $auth->add($loginToBackend);
//
//    $manageUser = $auth->createRole('ManageUser');
//    $manageUser->description = 'จัดการข้อมูลผู้ใช้งาน';
//    $auth->add($manageUser);
//    
//    //support VIO
//    $support = $auth->createRole('Support');
//    $support->description = 'การเพิ่มซอฟต์แวร์ ';
//    $auth->add($support);
//    
//    //support VIO
//    $supportVIO = $auth->createRole('Support Vio');
//    $supportVIO->description = 'การเพิ่มซอฟต์แวร์ Vio';
//    $auth->add($supportVIO);
//    
//    //support VIN
//    $supportVIN = $auth->createRole('Support Vin');
//    $supportVIN->description = 'การเพิ่มซอฟต์แวร์ Vin';
//    $auth->add($supportVIN);
//    
//    //support VIS
//    $supportVIS = $auth->createRole('Support Vis');
//    $supportVIS->description = 'การเพิ่มซอฟต์แวร์ Vis';
//    $auth->add($supportVIS);
//    
//    $management = $auth->createRole('Management');
//    $management->description = 'จัดการข้อมูลผู้ใช้งานและคอมพิวเตอร์';
//    $auth->add($management);
//
//    $admin = $auth->createRole('Admin');
//    $admin->description = 'สำหรับการดูแลระบบ';
//    $auth->add($admin);
//
//    $updateOwnPost = $auth->createPermission('updateOwnPost');
//    $updateOwnPost->description = 'แก้ไขบทความตัวเอง';
//    $updateOwnPost->ruleName = $rule->name;
//    $auth->add($updateOwnPost);
//
//    // $auth->addChild($support,$index);
//    // $auth->addChild($support,$view);
//    // $auth->addChild($support,$create);
//    // $auth->addChild($support,$update);
//    // $auth->addChild($management, $delete);
//
//    $auth->addChild($support, $createPost);
//    $auth->addChild($updateOwnPost, $updateComputer);
//    $auth->addChild($support, $updateOwnPost);
//    
//    //
//    $auth->addChild($support, $supportVIO);
//    $auth->addChild($support, $supportVIN);
//    $auth->addChild($support, $supportVIS);
//
//    $auth->addChild($manageUser, $loginToBackend);
//
//    $auth->addChild($management, $manageUser);
//    $auth->addChild($management, $support);
//
//    $auth->addChild($admin, $management);
//
//    $auth->assign($admin, 1);
//    $auth->assign($management, 2);
//    $auth->assign($support, 3);
//    //$auth->assign($support, 4);
//
//    Console::output('Success! RBAC roles has been added.');
//
//  }

    /* public function actionInit(){

      $auth = Yii::$app->authManager;
      $auth->removeAll();
      Console::output('Removing All! RBAC.....');

      $updateBlog = $auth->createPermission('UpdateBlog');
      $updateBlog->description = 'แก้ไขบทความ';
      $auth->add($updateBlog);

      $supportRole =  new \common\rbac\AuthorRule;
      $auth->add($supportRole);

      $updateOwnBlog = $auth->createPermission('UpdateOwnBlog');
      $updateOwnBlog->description = 'แก้ไขเฉพาะบทความของตัวเอง';
      $updateOwnBlog->ruleName = $supportRole->name;
      $auth->add($updateOwnBlog);
      $auth->addChild($updateOwnBlog,$updateBlog);

      $manageUser = $auth->createRole('ManageUser');
      $manageUser->description = 'สำหรับจัดการข้อมูลผู้ใช้งาน';
      $auth->add($manageUser);

      $support = $auth->createRole('Author');
      $support->description = 'สำหรับการเขียนบทความ';
      $auth->add($support);
      $auth->addChild($support, $updateOwnBlog);

      $editor = $auth->createRole('Editor');
      $editor->description = 'สำหรับการตรวจสอบบทความ';
      $auth->add($editor);
      $auth->addChild($editor, $support);

      $admin = $auth->createRole('Admin');
      $admin->description = 'สำหรับการดูแลระบบ';
      $auth->add($admin);

      $auth->addChild($admin, $editor);
      $auth->addChild($admin, $manageUser);

      $auth->assign($admin, 1);
      $auth->assign($editor, 2);
      $auth->assign($support, 3);
      $auth->assign($support, 4);

      Console::output('Success! RBAC roles has been added.');
      }
     */

    // public function actionInit(){
    //
 //   $auth = Yii::$app->authManager;
    //   $auth->removeAll();
    //   Console::output('Removing All! RBAC.....');
    //
 //   $createPost = $auth->createPermission('createBlog');
    //   $createPost->description = 'Create a application';
    //   $auth->add($createPost);
    //
 //   $updatePost = $auth->createPermission('updateBlog');
    //   $updatePost->description = 'Update application';
    //   $auth->add($updatePost);
    //
 //   $admin = $auth->createRole('Admin');
    //   $auth->add($admin);
    //
 //   $support = $auth->createRole('Author');
    //   $auth->add($support);
    //
 //   $management = $auth->createRole('Management');
    //   $auth->add($management);
    //
 //   $rule = new \common\rbac\AuthorRule;
    //   $auth->add($rule);
    //
 //   $updateOwnPost = $auth->createPermission('updateOwnPost');
    //   $updateOwnPost->description = 'Update Own Post';
    //   $updateOwnPost->ruleName = $rule->name;
    //   $auth->add($updateOwnPost);
    //
 //   $auth->addChild($support,$createPost);
    //   $auth->addChild($updateOwnPost, $updatePost);
    //   $auth->addChild($support, $updateOwnPost);
    //   $auth->addChild($management, $support);
    //   $auth->addChild($admin, $management);
    //
 //   $auth->assign($admin, 1);
    //   $auth->assign($management, 2);
    //   $auth->assign($support, 3);
    //   $auth->assign($support, 4);
    //
 //   Console::output('Success! RBAC roles has been added.');
    // }

    public function actionInit() {

        $auth = Yii::$app->authManager;
        $auth->removeAll();
        Console::output('Remove All RBAc...!');

        $manageUser = $auth->createRole('ManagerUser');
        $manageUser->description = ('สำหรับจัดการผู้ใช้งาน');
        $auth->add($manageUser);

        $loginToBackend = $auth->createPermission('loginToBackend');
        $loginToBackend->description = 'ล็อกอินเข้าใช้งานส่วน backend';
        $auth->add($loginToBackend);
        
        //support 
        $support = $auth->createRole('Support');
        $support->description = 'จัดการซอฟต์แวร์';
        $auth->add($support);
        
        //support VIO
        $supportVIO = $auth->createRole('SupportVIO');
        $supportVIO->description = 'จัดการซอฟต์แวร์ Vio';
        $auth->add($supportVIO);

        //support VIN
        $supportVIN = $auth->createRole('SupportVIN');
        $supportVIN->description = 'จัดการซอฟต์แวร์ Vin';
        $auth->add($supportVIN);

        //support VIS
        $supportVIS = $auth->createRole('SupportVIS');
        $supportVIS->description = 'จัดการซอฟต์แวร์ Vis';
        $auth->add($supportVIS);

        $management = $auth->createRole('Management');
        $management->description = 'สำหรับจัดการข้อมูลผู้ใช้งานและบทความ';
        $auth->add($management);

        $admin = $auth->createRole('Admin');
        $admin->description = 'สำหรับการดูแลระบบ';
        $auth->add($admin);

        $auth->addChild($management, $manageUser);
      
        $auth->addChild($manageUser, $loginToBackend);
        
        $auth->addChild($support, $supportVIO);
        $auth->addChild($support, $supportVIN);
        $auth->addChild($support, $supportVIS);
        
        $auth->addChild($management, $support);
        
        $auth->addChild($admin, $management);

        $auth->assign($admin, 1);
        $auth->assign($management, 2);
        $auth->assign($support, 3);
        $auth->assign($supportVIO, 3);
        
        Console::output('Success! RBAC roles has been added.');
    }

}

?>
