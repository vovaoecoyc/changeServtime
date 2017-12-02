<?php
            //setcookie("count", 0);
            session_start();
            
            if(isset($_POST['a1']))
            {
                $_SESSION['count1']++;
                unset($_POST['a1']);

            }
            if(isset($_POST['a2']))
            {
                $_SESSION['count2']++;
                unset($_POST['a2']);
            }
            
                $date = new DateTime();
                //возвращаем текущее время сервера при достижении 24 или 0 часов
                if(  ((int)$_SESSION['count1']-(int)$_SESSION['count2']+(int)$date->format('H')) >= 24 )
                    {
                      
                        $time['h'] = $date->format('H');
                        $_SESSION['count1'] = 0;$_SESSION['count2'] = 0;
                    }
                else
                {
                    if( ((int)$_SESSION['count1']-(int)$_SESSION['count2']+(int)$date->format('H')) <0 
                    )
                    {
                        
                        $time['h'] = $date->format('H');
                        $_SESSION['count2'] = 0;$_SESSION['count1'] = 0;
                    }
                    else
                    {
                        $time['h'] = (int)$_SESSION['count1']-(int)$_SESSION['count2']+(int)$date->format('H');
                    }
                }
                $time['i'] = $date->format('i');//date('i');
                $time['s'] = $date->format('s');//date('s');
                echo(json_encode($time));
                //session_destroy();//раскомментите, если хотите вернуть обратно время сервера, после этого закомментте для правльной работы программы :)
            

?>