<?php

/**
 * Created by PhpStorm.
 * User: adityajthakker
 * Date: 20/2/17
 * Time: 5:00 PM
 */

class Security{
    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public function is_ip_blocked(){
        $sql = "select * from blocked_ips where ip_address='".$this->escape($this->get_ip())."' and timestamp > TIME(DATE_SUB(NOW(), INTERVAL 1 HOUR))";
        $result = $this->connection->query($sql);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    public function add_to_blocked_ips(){
        $sql = "insert into blocked_ips (ip_address) values('".$this->escape($this->get_ip())."')";
        $result = $this->connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function get_attempts($email){
        $sql = "select * from login_attempts where ip_address='".$this->escape($this->get_ip())."' and email='".$this->escape(trim($email))."' and timestamp > TIME(DATE_SUB(NOW(), INTERVAL 1 HOUR))";
        $result = $this->connection->query($sql);
        return $result->num_rows;
    }

    private function escape($string){
         return $this->connection->real_escape_string($string);
    }

    public function add_login_attempt($phone){
        $sql_add_attempt = "insert into login_attempts (ip_address, user_agent, phone) values('".$this->escape($this->get_ip())."', '".$this->escape($_SERVER["HTTP_USER_AGENT"])."', '".$phone."')";
        $result_add_attempt = $this->connection->query($sql_add_attempt);
        if($result_add_attempt){
            return true;
        }else{
            return false;
        }
    }

    private function get_ip() {
        if ( function_exists( 'apache_request_headers' ) ) {
            $headers = apache_request_headers();
        } else {
            $headers = $_SERVER;
        }
        if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
            $the_ip = $headers['X-Forwarded-For'];
        } elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
        ) {
            $the_ip = $headers['HTTP_X_FORWARDED_FOR'];
        } else {
            $the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
        }
        return $the_ip;
    }

    public function insert_into_sessions($id){
        $token = $this->getToken(64);
        $sql_insert_into_log = "insert into logged_in_sessions (ip_address, user_agent, user_id, token, token_valid) ".
            " values('".$this->escape($this->get_ip())."', '".$this->escape($_SERVER["HTTP_USER_AGENT"])."', ".$id.", '".$token."', 'yes')";
        $result_insert_into_log = $this->connection->query($sql_insert_into_log);
        if($result_insert_into_log){
            return $token;
        }else{
            return null;
        }
    }

    public function validate_token($token){
        $sql = "select id from logged_in_sessions where token = '".$token."' and token_valid = 'yes'";
        $result = $this->connection->query($sql);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    public function crypt_rand_secure($min, $max){
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    public function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypt_rand_secure(0, $max-1)];
        }

        return $token;
    }

}