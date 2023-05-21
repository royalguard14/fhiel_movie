<?php 
$password = 'password';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$unhash = password_verify($password, $hashedPassword);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>hello</title>
 </head>
 <body>
 <h1><?php echo $password; ?></h1>
  <h1><?php echo $hashedPassword; ?></h1>
   <h1><?php echo $unhash; ?></h1>
 </body>
 </html>