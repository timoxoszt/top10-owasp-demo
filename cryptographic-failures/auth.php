<?php
    $flag = "timoxoszt{jwt_1s_guD_bUt_key_1s_uWu}";
    function generate_jwt($headers, $payload, $secret = 'iloveuuu') {
        $headers_encoded = base64url_encode(json_encode($headers));
        
        $payload_encoded = base64url_encode(json_encode($payload));
        
        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
        $signature_encoded = base64url_encode($signature);
        
        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
        
        return $jwt;
    }

    function base64url_encode($str) {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }

    function is_jwt_valid($jwt, $secret = 'iloveuuu') {
        // split the jwt
        $tokenParts = explode('.', $jwt);
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];
    
        // check the expiration time - note this will cause an error if there is no 'exp' claim in the jwt
        $expiration = json_decode($payload)->exp;
        $is_admin = json_decode($payload)->admin;
        $is_token_expired = ($expiration - time()) < 0;
    
        // build a signature based on the header and payload using the secret
        $base64_url_header = base64url_encode($header);
        $base64_url_payload = base64url_encode($payload);
        $signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
        $base64_url_signature = base64url_encode($signature);
    
        // verify it matches the signature provided in the jwt
        $is_signature_valid = ($base64_url_signature === $signature_provided);
        
        if ($is_token_expired || !$is_signature_valid) {
            return FALSE;
        }elseif($is_admin == true){
            return 1337;
        } else {
            return TRUE;
        }

        
    }

    $headers = array('alg'=>'HS256','typ'=>'JWT');

    if(isset($_GET["name"])){
        $payload = array('sub'=>'1234567890','name'=>$_GET["name"], 'admin'=>false, 'exp'=>(time() + 600000));
    }   else{
        $payload = array('sub'=>'1234567890','name'=>'guest', 'admin'=>false, 'exp'=>(time() + 600000));
    }
    

    $jwt = generate_jwt($headers, $payload);

    if(isset($_GET["name"])){
        echo "Hello <strong>".$_GET["name"]."</strong><br/>" . "Your token is: <strong>" . $jwt . "</strong>";
    }

    if (isset($_GET["token"])) {
        $is_jwt_valid = is_jwt_valid($_GET["token"]);
    }else{
        $is_jwt_valid = is_jwt_valid($jwt);
    }

    echo nl2br("\n");

    if($is_jwt_valid === 1337){
        echo $flag;
    }

    if($is_jwt_valid === TRUE) {
        echo 'JWT is valid';        
    } else {
        echo 'JWT is invalid';
    }

    echo '<br/> <a href="javascript:history.go(-1)">back</a><br/><a href="check.php">check token</a>';
?>