<?php
if(!empty($uLog->iduser))
{
setcookie('username', '', time()-3600*24*30, '/', $cookieDomain);
setcookie('password', '', time()-3600*24*30, '/', $cookieDomain);
}
header ('Location: index');