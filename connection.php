<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ln_database";

    $conn = mysqli_connect($hostname,$username,$password,$dbname);

    $data01_select_info = "SELECT * FROM ln_information";

    $data01 = $conn->query($data01_select_info);



    if(isset($_POST['l_login'])) {

        $id = $_POST['l_userName'];
        $pass = $_POST['l_pwd'];

        if($data01 && mysqli_num_rows($data01) > 0) {

            while($da01 = mysqli_fetch_assoc($data01)) {

                $check_id = $da01["ln_id"];
                $check_pass = $da01["ln_password"];

                if ($id == $check_id && $pass == $check_pass) {

                    header("Location: ticket.php?id=".$check_id);

                    exit();

                }

            }

        }
        echo "<p style='
        text-align: center;
        font-size: xxx-large;
        font-weight: bold;
        text-decoration: overline;
        position: absolute;
        left: 40%;
        top: 40%;
        '>I have no idea about the error</p>";
        exit();
    }

    if(isset($_POST['s_signup'])) {

        $user_id = $_POST['s_userName'];
        $mail = $_POST['s_userMail'];
        $phn = $_POST['s_userPhn'];
        $password = $_POST['s_pwd'];


        $s_query = "INSERT INTO ln_information(ln_id, ln_mail, ln_phn, ln_password) VALUES ('$user_id','$mail','$phn','$password')";

        $query_run = mysqli_query($conn, $s_query);

        
        header("Location: ticket.php?id=".$user_id);

        exit();

    }else{
        echo "<p style='
        text-align: center;
        font-size: xxx-large;
        font-weight: bold;
        text-decoration: overline;
        position: absolute;
        left: 40%;
        top: 40%;
        '>I have no idea about the error</p>";
    }

?>