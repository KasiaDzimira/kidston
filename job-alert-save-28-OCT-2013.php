<?PHP

include("support/firstline.php");

include("process/progressing-alert.php");
if(isset($_REQUEST['Submit']) && $_REQUEST['Submit']== "Sign Up")
{
    $fac = $_REQUEST["fac"];
    if($fac == "")
    {//#1
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $job_area = $_REQUEST["job_area"];
        $job_location = $_REQUEST["job_location"];
        $job_type = $_REQUEST["job_type"];
        $curdate=date("Y-m-d");

        $total = $db->fetchSingleRow("select * from job_master where email='".$email."'");

        if($total > 0){

            $resmsg =202;
        }else{

            $tbl = "job_master";
            $career_in["name"] = $name;
            $career_in["email"] = $email;
            $career_in["job_area"] = $job_area;
            $career_in["job_location"] = $job_location;
            $career_in["job_type"] = $job_type;
            $career_in["apply_on"] = $curdate;

            $staticid = $db->db_insert($tbl,$career_in);
            if($staticid > 0)
            {


                $job_email = $db->fetchSingleRow("select ID,name,email,job_area,job_location,job_type from job_master where ID= ".$staticid);
                $user_id =  $db->encode64("JMA:".$job_email['ID']);
                $user_email = $job_email['email'];
                $user_name = $job_email['name'];
                $user_job_area = $job_email['job_area'];
                $user_job_location = $job_email['job_location'];
                $user_job_type = $job_email['job_type'];


                $email_to = "recruiting@kidston.ch";
                //$email_to = "nalini@niyati.com";
                $email_subject  = "Applying for : ".$job_area;
                $email_txt ="";
                ?>
                <div style="display:none;">
                    <?PHP
                    ob_start();
                    include("mailer/admin_job_alert_mailer.php");
                    $email_txt = ob_get_contents();
                    ob_end_flush();
                    ?>
                </div>&nbsp;
                <?PHP


                $headers = "From: $email \r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                $ok = mail($email_to,$email_subject,$email_txt,$headers);
                /* Mail to Registered User*/

                $email_u_to = $user_email;
                $email_u_subject  = "Activation Required for Kidston Job alert";
                $uemail_txt = "";
                ?>
                <div style="display:none;">
                    <?PHP
                    ob_start();
                    include("mailer/user_job_alert_mailer.php");
                    $uemail_txt = ob_get_contents();
                    ob_end_flush();
                    ?>
                </div>
                <?PHP

                $yheaders = "From: Kidston | Support Team<noreply@kidston.ch> \r\n";
                $yheaders .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                $yok = mail($email_u_to,$email_u_subject,$uemail_txt,$yheaders);


                /* Mail to Registered User*/
            }
            $resmsg = 200;

        }//#1
    }
    ?>
    <script language="javascript">
      window.location = "<?php echo "job-alerts.php?status=".$resmsg;?>";
    </script>
    <?PHP
}
?>
