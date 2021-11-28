<?php

if (! function_exists('renamefile')) {
  function renamefile($oldname, $newname)
  {
     if(file_exists(ROOTDIR.'public'.$oldname)){
       //chi thay doi khi file ton tai
    rename(ROOTDIR.'public'.$oldname ,ROOTDIR.'public'.$newname);
     }
  }
}
if (! function_exists('session_get_once')) {
    // Đọc và xóa một biến trong $_SESSION
    function session_get_once($name, $default = null)
    {
        $value = $default;
        if (isset($_SESSION[$name])) {
            $value = $_SESSION[$name];
            unset($_SESSION[$name]);
            //lay va unset
        }
        return $value;
    }
}


if (! function_exists('exit_redirect')) {
    // Chuyển hướng đến một trang khác
    function exit_redirect($location, array $data = [])
    {


        foreach($data as $key => $value) {
            $_SESSION[$key] = $value;
        }

        header('Location: ' . $location);
        exit();
    }
}

?>
