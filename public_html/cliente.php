<?php
  
  # hire consumig api with php


  $url = 'http://localhost/appi/public_html/api/';
  $class = '/user'; #posso querer pegar vendas ou qualquer coisa
  $param = ''; #como id de usuarios
   $response = file_get_contents($url.$class.$param);
     

   #echo $response;
   var_dump($response);

   
   