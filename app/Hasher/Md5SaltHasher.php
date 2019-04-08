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
        $res1 = md5($value);
        $res1 = $res1.$salt;
        $res2 = md5($res1);
        return $res2."$".$salt;

    }

    public function info($hashedValue)
    {
        return [];
    }

    public function check($value, $hashedValue, array $options = [])
    {
        $data = explode("$", $hashedValue);
        $res1 = md5($value);
        $res1 = $res1.$data[1];
        $res2 = md5($res1);
        if($res2 == $data[0])
            return true;
        return false;
    }

    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }
};