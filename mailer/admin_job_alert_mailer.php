<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Kidston</title>
<style type="text/css">
table, tr, td {	font-family:Arial;font-size:12px;line-height:18px;color:#4C4C4C;font-weight:normal;}
.foot-txt {font-size:12px;color:#47a2cf;font-weight:bold;}
.text {font-family:Arial;font-size:12px;line-height:18px;color:#4C4C4C;}
.bdr-left {background-color:#ebebeb;border-right:#e3e3e3 1px solid;}
.bdr-right {background-color:#ebebeb;border-left:#e3e3e3 1px solid;}
.bdr-bot {background-color:#ebebeb;border-top:#e3e3e3 1px solid;}
.bg-clr {background-color:#ebebeb;}
a.web-link {font-size:14px;font-weight:bold;color:#f6e9e8;text-decoration:none;}
a.web-link:hover {color:#f6e9e8;font-weight:bold;text-decoration:underline;}
a {color:#323232;font-weight:normal;text-decoration:underline;}
a:hover {color:#656565;font-weight:normal;text-decoration:none;}
</style>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<table width="722" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="92" align="left" valign="middle" bgcolor="8e342b"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="50">&nbsp;</td>
          <td height="63" align="left" valign="middle"><a href="http://www.kidston.ch/" target="_blank"><img src="<?PHP echo SITE_URL; ?>knpic/mailer-logo.gif" width="80" height="63" border="0"></a></td>
          <td align="right" valign="bottom"><a href="http://www.kidston.ch/" target="_blank" class="web-link">www.kidston.ch</a></td>
          <td width="40">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="17" align="left" valign="top" class="bdr-left"><img src="<?PHP echo SITE_URL; ?>knpic/mailer-bdr-left.gif" width="17" height="32"></td>
          <td align="left" valign="top">&nbsp;</td>
          <td align="left" valign="top">&nbsp;</td>
          <td align="left" valign="top">&nbsp;</td>
          <td width="17" align="left" valign="top" class="bdr-right"><img src="<?PHP echo SITE_URL; ?>knpic/mailer-bdr-right.gif" width="17" height="32"></td>
        </tr>
        <tr>
          <td width="17" align="left" valign="top" class="bdr-left">&nbsp;</td>
          <td width="40" align="left" valign="top">&nbsp;</td>
          <td align="left" valign="top">Hello Administrator,<br>
            <br>
            There was a new email sign up, the details are below<br>
            <p><strong>Name:</strong>&nbsp;&nbsp;&nbsp;<?PHP echo $name; ?> </p>
            <p><strong>E-Mail:</strong>&nbsp;&nbsp;&nbsp;<?PHP echo $email; ?></p>
            <p><strong>Job Area:</strong>&nbsp;&nbsp;&nbsp;<?PHP echo $job_area; ?></p>
            <p><strong>Job Location:</strong>&nbsp;&nbsp;&nbsp;<?PHP echo $job_location; ?> </p>
            <p><strong>Job Type:</strong>&nbsp;&nbsp;&nbsp;<?PHP echo $job_type; ?></p>
            <p>&nbsp;</p></td>
          <td width="40" align="left" valign="top">&nbsp;</td>
          <td width="16" align="left" valign="top" class="bdr-right">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" class="bg-clr">&nbsp;</td>
          <td align="left" valign="top" class="bdr-bot">&nbsp;</td>
          <td height="60" align="center" valign="middle" class="bdr-bot">&nbsp;</td>
          <td align="left" valign="top" class="bdr-bot">&nbsp;</td>
          <td align="left" valign="top" class="bg-clr">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>