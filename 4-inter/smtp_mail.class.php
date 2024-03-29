<?php
class smtp_mail {
    private $host;
    private $port = 25;
    private $user;
    private $pass;
    private $debug = false;
    private $sock;
    private $mail_format = 0;

    //构造函数
    function __construct($host, $port, $user, $pass, $format = 1, $debug = 0)  {
        $this->host = $host;
        $this->port = $port;
        $this->user = base64_encode($user);
        $this->pass = base64_encode($pass);
        $this->mail_format = $format;
        $this->debug = $debug;

        $this->sock = fsockopen($this->host, $this->port, $errno, $errstr, 5);

        if (!$this->sock) {
                exit("error:" . $error . ",msg:" . $errstr);
        }

         $response = fgets($this->sock);
         if (strpos($response, "220") === false) {
              exit("server error:" . $response);
        }
    }

    private function show_debug($message) {
        if ($this->debug) {
            echo "<p>Debug:$message</p>\n";
       }
    }

     //把命令发送给服务器并取得反馈
     private function do_command($cmd, $return_code) {
         fwrite($this->sock, $cmd);
         $response = fgets($this->sock);
         $this->show_debug(substr($cmd, 0, 100) . ':'. $response);
         if (strpos($response, "$return_code") === false) {
             return false;
         }
         return true;
     }

     //邮箱是否合法
      private function is_email($email)
      {
           $pattern = "/^[^_][\w]*@[\w.]+[^_]$/";
           if (preg_match($pattern, $email, $matches)) { 
                return true;
          } else {
               return  false;
          }
      }

      //发送邮件
      function send_mail($from, $to, $subject, $body)
      {
            if(!$this->is_email($from) or !$this->is_email($to)) {
                $this->show_debug("Please enter vaild from/to email.");
                return false;
           }

           if (empty($subject) || empty($body)) {
                $this->show_debug("please enter subject/body.");
                return false;
          }
            $detail = "From:" . $from . "\r\n";
            $detail .= "To:" . $to . "\r\n";
            $detail .= "Subject:" . $subject . "\r\n";

           if ($this->mail_format ==1) {
                $detail .= "Content-Type:text/html;\r\n"; 
            }  else {
                $detail .= "Content-Type:text/plain;\r\n";    
             }
           
            $detail .= "charset=gb2312\r\n\r\n";
            $detail .= $body;
            $commands = [
              ["HELO " . $this->host . "\r\n", 250], \\["EHLO $host", "220,250"];
              ["AUTH LOGIN\r\n", 334],
              [$this->user . "\r\n", 334],
              [$this->pass . "\r\n", 235],
              ["MAIL FROM: ". $from.  "\r\n", 250],
              ["RCPT TO: ". $to.  "\r\n", 250],
              ["DATA\r\n", 354],
              ["$detail\r\n.\r\n", 250],  \\["$detail\r\n", 250],[".\r\n", 250]
              ["QUIT\r\n", 354],
            ];

            foreach ($commands as $command) {
              if (!$this->do_command($command[0], $command[1])) {
                exit('exit');
              }
            }
            return true;
      }
}
