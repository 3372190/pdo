<?php
 /**
  * Base Model That allow us to set Default Time and DOMCdataSection
  *
  *
  *
  */
namespace pdoo\Models;

use Carbon\Carbon;


 class Model
 {
     protected $dates = [];

     protected $hidden = [];

     public function __construct(){

          foreach ($this->dates as $date) {
              //Checking if the value is null?
              if(!$this->{$date}){
                continue;
              }

              return $this->{$date} = new Carbon($this->{$date});
          }
     }


     /**
      * Building API , Pass Models date to Javacript
      * Pass it As JSON!!!!
      * Convert to JSON Encoded String!!
      *   - Unable to echo out the whole Object,
      *      - Will ge Array to String Conversion Error
      *
      * To solve this, implement a magic method!!
      * __toString();
      * Filter Out Data in json_encode!!!
      */

     public function __toString()
     {
       foreach ($this->hidden as $hidden) {
         //unset the array!! of 'id','password'
         unset($this->{$hidden});
       }
        return json_encode($this);
     }

 }
