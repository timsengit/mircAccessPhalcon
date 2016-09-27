#3 微型权限管理系统
1. 设计两张表，用户表/用户组表
2. 用户表：用户id，姓名，性别，qq，电话，添加实践，所属用户组
3. 用户组：用户组id，用户组名称，用户组权限
        要求：
1. 用户管理，增删改查
2. 用户组管理，增删改查，权限管理
3. phalcon框架/medoo数据查询，变量、控制器需命名规范，有意义
4. 权限字段内容：控制器的标示
5. 每个action里面可以需要有权限判断，也可以在控制器init方法里面自动判断
  -------------------------------------------------------------
  ##实现原理：
  1.登录时保持Session信息
  2.登入后使用控制器资源时判断权限
`class PostsController extends \Phalcon\Mvc\Controller
 {

     public function beforeExecuteRoute($dispatcher)
     {
         // 这个方法会在每一个能找到的action前执行
         //取得该Action名称
         //取得Session信息
         //判断权限
         if ($dispatcher->getActionName() == 'save') {

             $this->flash->error("You don't have permission to save posts");

             $this->dispatcher->forward(array(
                 'controller' => 'home',
                 'action' => 'index'
             ));

             return false;
         }
     }

     public function afterExecuteRoute($dispatcher)
     {
         // 在找到的action后执行
     }

 }`

