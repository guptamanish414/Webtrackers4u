<?   
  $os->processLogin('username','password','admin'); 
 
 ?>
<?php if($os->isLogin()){

?>
 
<script type="text/javascript" language="javascript">
window.location="<?php echo $site['url-wtos'].'dashBoard.php'?>";
</script>
 

<?php exit(); } ?>
<?php if(!$os->isLogin()){ ?>

<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #d91a3b;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}

.form .header {
  margin: 15px 0 10px;
  color: #b3b3b3;
  font-size: 18px;
}
.form .logo{width: 30%}

.form .message a {
  color: #d91a3b;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #d91a3b; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #d91a3b, #8DC26F);
  background: -moz-linear-gradient(right, #d91a3b, #8DC26F);
  background: -o-linear-gradient(right, #d91a3b, #8DC26F);
  background: linear-gradient(to left, #d91a3b, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>

<div class="login-page">

  <div class="form" >
    <img class="logo" src="<?php echo $site['url-wtos'] ?>images/loginlogo.png" alt="" />
    <p class="header"><? echo $os->adminTitle ?></p>
    <form class="login-form" id="loginForm" method="post">
      <input type="text" placeholder="username" name="username" required/>
      <input type="password" placeholder="password" name="password" required/>
      <button onclick="document.getElementById('loginForm').submit()">login</button>
      <input type="hidden" name="SystemLogin" value="SystemLogin"/>
      <p class="message">Copyright © <? echo date('Y');?> <? echo $os->adminTitle ?> All rights reserved <a href="http://webhouse4u.co.uk/Contact-Us" target='_blank'>Connect to us..</a></p>
    </form>
  </div>
</div>




<?php exit(); } ?>


<script type="text/javascript">

  $('.message a').click(function(){

   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");

});

</script>
