<?php if(!defined('SECURITY')) exit('404 - Not Access');

   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('db/ArtikelOL.db3');
      }
   }

   	

 ?>