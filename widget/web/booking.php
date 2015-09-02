<?php 
// define('API_URL', 'http://localhost/bookrest');
// define('WEBSERVICE_URL', 'http://localhost/bookrest');

define('API_URL', 'https://rest.ionutparaschiv.com/bookrest');
define('WEBSERVICE_URL', 'https://rest.ionutparaschiv.com/bookrest');
if(!empty($_POST)){
    switch ($_POST['method']) {
    case 'getServices':
        $email = 'ionut@htd.ro';
        $password = '1234';

        $data = $_POST;


        $auth = array(
            'email' => $email,
            'password' => $password
            );
        $url = API_URL.'/api/v2/company/'.$data['company_id'].'/service';
        $result = getData($url , $auth);
        if($result->success){
            echo json_encode($result);
        }
        break;
    case 'getStaff':
        $email = 'ionut@htd.ro';
        $password = '1234';

        $data = $_POST;


        $auth = array(
            'email' => $email,
            'password' => $password
            );
        $url = API_URL.'/api/v2/company/'.$data['company_id'].'/staff';
        $result = getData($url , $auth);
        if($result->success){
            echo json_encode($result);
        }
        break;
    case 'sendEmail':

        $url = WEBSERVICE_URL.'/webservice/';
        $email = $_POST['email'];

        $params = new stdClass();
        $params->email = $email;
        $params->method = "sendConfirmationCode";


        $response = callWebService($url, $params);

        break;
    case 'checkCode':

        $url = WEBSERVICE_URL.'/webservice/';
        $code = $_POST['code'];

        $params = new stdClass();
        $params->method = "checkCode";
        $params->code = $code;

        $response = callWebService($url, $params);

        $result = new stdClass();
        if($response == 'true'){
            $result->status = true;
            
        }else{
            $result->status = false;
        }

        echo json_encode($result);
        break;
    case 'createBooking':

        $url = API_URL.'/api/v2/company/'.$_POST['companyId'].'/booking';
        $code = $_POST['confCode'];
        $params = new stdClass();
        $params->company_id = $_POST['companyId'];
        $params->service_id = $_POST['service'];
        $params->staff_id = $_POST['staff'];
        $params->start = $_POST['date'];
        $params->name = $_POST['name'];
        $params->surname = $_POST['surname'];
        $params->email = $_POST['email'];
        $params->phone = $_POST['phone'];

        $auth = array(
            'email' => 'ionut@htd.ro',
            'password' => '1234'
            );

        $response = PostRequest($url, $params, $auth);

        $return = new stdClass();
        if($response->success){

            $return->success = true;

            $host = WEBSERVICE_URL.'/webservice/';

            $params = new stdClass();
            $params->method = "expireCode";
            $params->code = $code;

            $result = callWebService($host, $params);


        }else{
            $return->success = false;

        }
        echo json_encode($return);
        break;
    default:
        # code...
        break;
}
}
function PostRequest($host, $args, $authArgs = array()){
    $params = array(
            'key' => 'ec75c64b295ed40a799c924e663a807b',
            'json' => json_encode($args)
        );
    $email = $authArgs['email'];
    $password = $authArgs['password'];
    $query_string = http_build_query($params);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $host);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, $email.":".$password);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    
    $jsondata = curl_exec($ch);
    curl_close($ch);
    # Decode JSON String
    if($data = json_decode($jsondata)) {
        $response = new stdClass();
        $response->status = 200;
        $response->success = true;
        $response->data = json_encode($data);

        return $response;
    
    }

    $response = new stdClass();

    $response->statusCode = 500;
    $response->statusText = 'Unknown API error';

    return $response; 
}
function getData($path, $authArgs){
    $email = $authArgs['email'];
    $password = $authArgs['password'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $path);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, $email.":".$password);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    
    $jsondata = curl_exec($ch);
    curl_close($ch);

    if($data = json_decode($jsondata)) {
        $response = new stdClass();
        $response->status = 200;
        $response->success = true;
        $response->data = json_encode($data);

        return $response;
    
    }

    $response = new stdClass();

    $response->success = false;
    $response->status = 500;
    $response->statusText = 'Unknown API error';

    return $response; 
}


function callWebService($host, $args){
    
    $query_string = http_build_query($args);


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $host);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    
    $jsondata = curl_exec($ch);
    curl_close($ch);
    return $jsondata;
}
 ?>

