<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Dunkin&#39; Donut | Email Verification</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="80%;" style="margin:0 auto; max-width:840px;">
        <tr>
            <td>
                <h1><img alt="Dunkin&#39; Donuts" src="<?= site_url('img/logo.png'); ?>"></h1>
            </td>
        </tr>
        <tr>
            <td>
                <h2 style="font-weight:bold; font-size: 28px; font-family: Arial, sans-serif; margin:0px;">Welcome to the Dunkin&#39; Donuts Online Delivery!</h2>
            </td>
        </tr>
        <tr>
            <td>
               <p style="margin:10px 0px 0px 0px; font-family: Arial, sans-serif; ">Now it&#39;s easier to have your #DunkinMoments with just a click at the convenience of your home.</p>
            </td>
        </tr>
         <tr>
            <td>
               <p style="margin:10px 0px 0px 0px; font-family: Arial, sans-serif; ">You just signed up for Dunkin&#39; Donuts. Please follow this link to confirm that this is your e-mail address.</p>
            </td>
        </tr>
         <tr>
            <td>
                <a href="<?php echo site_url('users/user_confirmation') .'/'. $code;?> " style="color: #f5821f; font-style:italic; text-decoration:none; font-family: Arial, sans-serif; margin:10px 0px 0px 0px; display:inline-block;"><?php echo site_url('users/user_confirmation') .'/'. $code; ?></a>
            </td>
        </tr>
        <tr>
            <td>
                <p  style="text-decoration:none; font-family: Arial, sans-serif; margin:10px 0px 0px 0px; display:inline-block;">Keep updated with Dunkin&#39; Donuts online by visiting us at</p>
                <ul style="list-style:none; padding-left:0px;">
                  <li style="float:left; margin:0px 15px 0px 0px;"><img src="<?= site_url('img/fb-small.png'); ?>"><a href="https://www.facebook.com/Dunkin-Donuts-168451339971164/timeline/" style="text-decoration:none; color:#333; padding:0px 0px 0px 4px; float: right; margin: 2px 0px 0px 0px;"  >Dunkin' Donuts</a></li>
                  <li style="float:left; margin:0px 15px 0px 0px;"><img src="<?= site_url('img/twitter-small.png'); ?>"><a href="https://twitter.com/dunkindonutsph" style="text-decoration:none; color:#333; padding:0px 0px 0px 4px; float: right; margin: 2px 0px 0px 0px;">@dunkindonutsph</a></li>
                  <li style="float:left; margin:0px 15px 0px 0px;"><img src="<?= site_url('img/instagram-small.png'); ?>"><a href="https://instagram.com/dunkindonuts.ph/" style="text-decoration:none; color:#333; padding:0px 0px 0px 4px; float: right; margin: 2px 0px 0px 0px;">dunkindonuts.ph</a></li>
                </ul>
            </td>
        </tr>
         <tr>
            <td>
                <p style="max-width:660px; margin-top:5px; font-size: 15px; background: #ededed; padding:10px; border-radius:8px; -moz-border-radius:8px; -webkit-border-radius:8px; -o-border-radius:8px; font-family: Arial, sans-serif; " >Please do not reply to this message; it was sent from an unmonitored email address. This message is a service email related to your use of Dunkin&#39; Delivery.</a></p>
            </td>
        </tr>
    </table>
</body>
</html>
