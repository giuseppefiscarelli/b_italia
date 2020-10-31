<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
/*
require_once 'model/user.php';
$updateUrl = 'userUpdate.php';
$deleteUrl = 'controller/updateUser.php';
*/
require_once 'headerInclude.php';

?>
 <div class="container my-4">
        <h1>Hello</h1>
        <p><?=$_SESSION['userData']['roletype']?></p>
        //  <?=var_dump($_SESSION['userData'])?>
  
        
      </div>
     
<!--End Dashboard Content-->

<?php
    require_once 'view/template/footer.php';
?>
<script type="text/javascript">
  
</script>
</body>
</html>    