<?php
  class LoginAction extends Action{
      public function index(){
          $this->display("../Public/login");
          $this->display("../Public/endgoods");
      }
      public function login(){
          $uid = $_POST['uname'];
          $pwd = md5($_POST['password']);
          $db = m('user');
          $data = $db->where(array('id'=>$uid))->find();
          if(count($data)){
              if($data['password']==$pwd){
                    @session_start();
                    $_SESSION['id']=$uid;
                    echo 1;
              }else{
                  echo 0;
              }
          }else{
              echo 0;
          }

      }
  }

?>