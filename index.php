<?php 
        // Check if User Coming From Request 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      // assign variables 
      
      $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING) ;
      $mail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
      $phone= filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
      $msg  = filter_var($_POST['message'],FILTER_SANITIZE_STRING) ;
      
      //Show Errors
      
      $form_errors = array();
      if (strlen($user) < 4) {
       $form_errors[] = 'Username Must Be More Than <strong>3 characters </strong>'; 
      } 
      if (strlen($msg) <= 10) {
       $form_errors[] = 'Message Is <strong>Too Short !</strong>'; 
      }
      
      // If No Errors Send The Mail 
      
      $headers = 'From :' . $mail . '\r\n';
      $myEmail = 'azzi4design@gmail.com';
      $subject = 'Contact Form';
      
      if (empty($form_errors)) {
          
          mail($myEmail ,$subject ,$msg ,$headers);
          $success = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Thanks !</strong> , We Have Been Received Your Message </div>
          ' ;
         $user = '' ;
         $mail = '' ;
         $phone= '' ;
         $msg  = '' ;          
      }
      
  }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
   <meta charset="utf-8"/>
   <!--first mobile meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>My Contact Form</title>
   <link rel='stylesheet' href='css/bootstrap.css'/>
   <link rel='stylesheet' href='css/font-awesome.min.css'/>
   <link rel='stylesheet' href='css/contact.css'/>
   <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
	  <script src="js/respond.min.js"></script>
   <![endif]-->

  </head>
  <body>
      <div class="container">
          
         <h1 class="text-center">Contact Us</h1>

        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST" >
                          
             <?php 
                    if(! empty($form_errors)) { ?>

                   <div class="errors alert alert-danger alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                         <?php   
                             foreach ($form_errors as $error) {
                                 echo $error . "<br/>";  
                          } ?>

                   </div>  
              <?php  }  ?>
              <?php 
                    if(isset($success)){ 
                        echo $success;
                    } 
              ?>
              <div class="form-group">
                  <input 
                     class="username form-control"  
                     type="text"
                     name="username"
                     placeholder="Type Your Username" 
                     value="<?php if(isset($user)){echo $user;} ?>" />
                  <i class="fa fa-user fa-fw"></i> 
                  <span class="asterix">*</span>
                  <div class="alert alert-danger custom-alert">
                     Username Must Be More Than <strong>3 characters </strong>
                  </div>
              </div>  
              <div class="form-group"> 
               <input
                 class="email form-control"
                 type="email"
                 name="email"
                 placeholder="Please Type a Valid Email"
                 value="<?php if(isset($mail)){echo $mail;} ?>"/>
               <i class="fa fa-envelope fa-fw"></i>
               <span class="asterix">*</span>
               <div class="alert alert-danger custom-alert">
                   Please Use A <strong>Valid Email</strong> 
               </div>
              </div>      
              <input
               class="form-control"   
               name="phone" 
               placeholder=" Type Your Cell Phone"
               value="<?php if(isset($phone)){echo $phone;} ?>"/> 
              <i class="fa fa-phone fa-fw"></i>

            <div class="form-groupe">   
              <textarea
                class="message form-control"
                name="message" 
                placeholder="Your message !"><?php if(isset($msg)){echo $msg;} ?></textarea>
                <div class="alert alert-danger custom-alert">
                  Message Is <strong>Too Short !</strong>
                </div>
            </div>  

              <input 
                     class="btn btn-success btn-large" 
                     type="submit" 
                     value="Send Message" /> 
              <i class="fa fa-send fa-fw icon-send"></i>  
          
         </form>
    
      </div>
      <script src="js/jquery-1.11.2.min.js"></script> 
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/contact.js"></script>  
  </body>