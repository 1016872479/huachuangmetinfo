<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <title>Tp语言设置测试</title>
  <meta name="keywords" content="关键字列表" />
  <meta name="description" content="网页描述" />
  <link rel="stylesheet" type="text/css" href="" />
  <style type="text/css"></style>
  <script type="text/javascript"></script>
</head>
<body>
<p><?php echo ($lang["COMPANY"]); ?>   <?php echo ($lang["COMPANY1"]); ?>   <?php echo ($lang["INC"]); ?>  <?php echo ($lang["PAN"]); ?>   <?php echo ($lang["CUS"]); ?>  <?php echo ($lang["CONTACt"]); ?></p>

<?php if(is_array($mylangs)): foreach($mylangs as $key=>$value): ?><a href="?l=<?php echo ($value['mark']); ?>"><?php echo ($value['name']); ?></a> &nbsp;&nbsp;<?php endforeach; endif; ?>
</body>
</html>