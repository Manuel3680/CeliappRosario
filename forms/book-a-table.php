<?php
  $receiving_email_address = 'celiapprosario@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $book_a_table = new PHP_Email_Form;
  $book_a_table->ajax = true;
  
  $book_a_table->to = $receiving_email_address;
  $book_a_table->from_name = $_POST['name'];
  $book_a_table->from_email = $_POST['email'];
  $book_a_table->subject = "Un nuevo local quiere sumarse a Celiapp";

  
  $book_a_table->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'celiapprosario@gmail.com',
    'password' => 'kkjjdgsqfyertpof',
    'port' => '587'
  );
  

  $book_a_table->add_message( $_POST['name'], 'Nombre');
  $book_a_table->add_message( $_POST['email'], 'Email');
  $book_a_table->add_message( $_POST['phone'], 'Teléfono', 4);
  $book_a_table->add_message( $_POST['date'], 'Dirección', 4);
  $book_a_table->add_message( $_POST['time'], 'Como nos conoció', 4);
  $book_a_table->add_message( $_POST['people'], 'Tipo de comercio', 1);
  $book_a_table->add_message( $_POST['message'], 'Mensaje');

  echo $book_a_table->send();
?>