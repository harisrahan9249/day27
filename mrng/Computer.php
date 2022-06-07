<?php

class Computer 
{
   public static $nr_of_computers = 0;

   public static function getnrofcomputer()
   {
       return static :: $nr_of_computers;
  }

  public static function clearnroffcomputer()
   {
    static :: $nr_of_computers = 0;
  }

  public static function makenewobject()
  {
       static :: class;
 }



   public $model = null;
   public  $operating_system = null;
   public $is_portable = null;
   public $status = 'off';

   public function __constructor()
   {
    static :: $nr_of_computers++;
  }

 //6
   public function switchoff()
   {
       $this->status = 'off';
   }
   //7
   public function togggleswitch()
   {
       $this->status = $this->status =='off' ? 'on' : 'off';
   }

}