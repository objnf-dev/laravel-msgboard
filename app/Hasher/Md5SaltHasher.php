<?php

namespace App\Hasher\Md5SaltHasher;

use Illuminate\Contracts\Hashing\Hasher;

class Md5SaltHasher implements Hasher{
    public function randomString($len){
        $res = "";
        $table = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        for ($i=0;$i<$len;$i++){
            $rndInt = rand(0,strlen($table)-1);
            $res.=$table[$rndInt];
        }
        return $res;
    }

    public function make($value, array $options = [])
    {
        $salt = $this->randomString(15);
        $res = md5($value, $salt);
        return $res."$".$salt;

    }

    public function info($hashedValue)
    {
        return [];
    }

    public function check($value, $hashedValue, array $options = [])
    {
        $data = explode($value, "$");
        $hash = md5($data[0],$data[1]);
        if($hashedValue == $hash)
            return true;
        return false;
    }

    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }
};