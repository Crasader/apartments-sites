<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $siteName?></title>
</head>
<body style="background:<?php echo $siteBackgroundColor?> url(<?php echo $siteURL?>/images/bg-pattern.png) top left repeat;">
  <table cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" width="500" style="margin:10px auto; color:#535353; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif;  line-height:18px;">
    <tr>
      <td bgcolor="#97c25b" width="500" height="52" valign="top"><img src="<?php echo $siteURL?>/images/weve-moved-title.png" alt="we've moved" /></td>
    </tr>
    <tr>
      <td valign="top" style="padding:15px;">
        <img src="<?php echo $strImageURL?>" alt="<?php echo $strName?>" alt="image" align="left" style="padding: 0 15px 0 0;" />
        <span style="font-size:16px; color:#76a13b;"><?php echo $strName?></span><br />
        <br />
        <?php echo $strAddress?><br />
        <?php echo $strCSZ?><br />
        <?php echo $strPhone?><br />
        <a href="mailto:<?php echo $strEmail?>"><?php echo $strEmail?></a><br />
      </td>
      </tr>
      <tr>
      <td valign="top" style="padding:15px 15px 45px 15px;">
        <?php echo nl2br($strMessage)?>
      </td>
      </tr>
      <tr>
      <td bgcolor="#ededed" valign="top" style="border-top:solid 1px #929292; padding:15px 0;">
        <table cellpadding="0" cellspacing="0" border="0" width="500" style="font-size:10px; line-height:14px;">
          <tr>
          	<td width="10"></td>
            <td width="190" valign="top">
            <?php if($siteLogo):?>
              <img src="<?php echo $siteURL?>/uploads/properties/<?php echo $siteLogo?>" alt="logo" />
            <?php else: ?>
              <strong><?php echo $siteName?></strong>
            <?php endif;?>
            </td>
            <td valign="top">
            <?php echo $siteAddress?><br />
            <?php echo $siteCSZ?><br />
            <br />
            <em>Phone:</em> <?php echo $sitePhone?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em>Fax:</em> <?php echo $siteFax?><br />
            <em>Website:</em> <a href="<?php echo $siteURL?>"><?php echo preg_replace('/http:\/\//','',$siteURL)?></a><br />
            <em>Email:</em> <a href="mailto:<?php echo $siteEmail?>"><?php echo $siteEmail?></a>
          </td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
</body>
</html>