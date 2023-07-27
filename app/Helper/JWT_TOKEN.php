<?php
namespace App\Helper;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Throwable;

class JWT_TOKEN{

    
    public static function create_token( $user_email, $user_id ){
        $key = env( 'JWT_KEY' );
        $payload = [
            'iss'     => 'todo-app',
            'iat'     => time(),
            'exp'     => time() + ( 60 * 60 * 2 ), // expired after 2 hours
            'user_email' => $user_email,
            'user_id' => $user_id,
        ];
        return JWT::encode( $payload, $key, 'HS256' );
    }

    public static function verify_token($token){

        try{
        $key = env( 'JWT_KEY' );
        if($token==null){
            return 'unauthorized';
        }
        else{
        $decode =  JWT::decode($token,new Key($key,'HS256'));
        return $decode;

        }

        }
        catch(Throwable $th){
            return 'unauthorized';
        }
        
    }


    public static function reset_token( $user_email,$user_id=null){
        $key = env( 'JWT_KEY' );
        $payload = [
            'iss'     => 'todo-app',
            'iat'     => time(),
            'exp'     => time() + ( 60 * 60 * 2 ), // expired after 2 hours
            'user_email' => $user_email,
            'user_id' => $user_id,
        ];
        return JWT::encode( $payload, $key, 'HS256' );
    }

}



?>