<?php

namespace pdoo\Models;

class User extends Model{

      protected $dates = [
          'created','last_active',
      ];

      protected $hidden = ['id','password'];

      public function getUserName()
      {
        return $this->getFullName() ?: $this->username;
      }


      public function getFullName()
      {
        if(!$this->first_name && !$this->last_name){
          return null;
        }

        return $this->first_name.$this->last_name;
      }

      /**
       * Carbon Instance!!
       *    -
       */

}
