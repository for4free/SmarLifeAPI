<?php
// 首先需要检测目录是否存在
    echo 'suc1<br>';
    $fmlNu = 'iii1';
    if (!is_dir('upload/icloud/')){
        echo 'suc2<br>';
        mkdir('upload/icloud/',0777); // 如果不存在则创建
        echo 'suc3<br>';
        chmod('upload/icloud/',0777);
        echo 'suc4<br>';
    }
/*function deldir($dir)
{
    $dh = opendir($dir);
    while ($file = readdir($dh))
    {
        if ($file != "." && $file != "..")
        {
            $fullpath = $dir . "/" . $file;
            if (!is_dir($fullpath))
            {
                unlink($fullpath);
            } else
            {
                deldir($fullpath);
            }
        }
    }
    closedir($dh);
    if (rmdir($dir))
    {
        return true;
    } else
    {
        return false;
    }
}

deldir('upload/icloud'); // e:/test/aaa 是你要删除的文件夹*/

?>