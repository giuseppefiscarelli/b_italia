<?php
session_start();
require_once 'functions.php';

if(isUserLoggedin()){
    if ($_SESSION['userData']['ambiente'] == '2'){

        header('Location: HMR/indexhmr.php'); 
      }elseif($_SESSION['userData']['ambiente'] == '1'  ){
         header('Location: index.php'); 
      
      }elseif($_SESSION['userData']['ambiente'] == '8'||$_SESSION['userData']['ambiente'] == '8'){
         header('Location: index.php'); 
     
      }elseif($_SESSION['userData']['ambiente'] == '7'){
        header('Location: presentazione.php'); 
    
     }
    exit;
}


$bytes= random_bytes(32);
$token = bin2hex($bytes);
$_SESSION['csrf']= $token;



require_once 'view/top.php';

?>

<div id="wrapper" style="padding:10px;">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body"   style="box-shadow:0px 0px 50px 12px rgba(255,255,255,0.75);">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="images/logo_setec_250.png" alt="logo icon">
             </div>
             <?php
                if(!empty($_SESSION['message'])){?>


                

                    <div id ="message" style="margin-top:20px" class="alert alert-warning alert-dismissible mb-0" role="alert">
                    
                        <div class="alert-icon contrast-alert">
                        <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="alert-message">
                        <span><strong>Warning!</strong> <?=$_SESSION['message']?></span>
                        </div>
                    </div>


            <?php 
                $_SESSION['message'] ='';           
                }
             ?>
		  
            <form style="margin-top:40px" action="verify-login.php" method="post">
            <input type="hidden" name="_csrf" value="<?=$token?>">
			  <div class="form-group">
			  <label for="username" class="sr-only">email</label>
			   <div class="position-relative has-icon-right">
				  <input type="email" id="email" name="email" class="form-control input-shadow" placeholder="Enter Email" required>
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="password" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Enter Password" required>
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
              <div class="form-row">
              <div class="form-group col-6">
			   <div class="icheck-material-primary">
                <input type="checkbox" id="user-checkbox"  />
                <label for="user-checkbox">Remember me</label>
			  </div>
			 </div>
              </div>  
			 <button type="submit" class="btn btn-primary btn-block" style="margin-top: 40px;">Accedi</button>
			  
			 
			 </form>
		   </div>
		  </div>
		  
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	
	
	</div><!--wrapper-->








<?php
    require_once 'view/footer.php';
?>
<style>
    .footer{
        left:0px

    }
    body{
       background-image:url("images/1600x900.jpg");
       
       background-repeat:no-repeat;
       background-size:cover;    
    }
    
    </style>
<script type="text/javascript">
        
    }    </style>
<script type="text/javascript">
  
</script>

</body>
</html>    


