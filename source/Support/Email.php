<?php 

    namespace Source\Support;

    use PHPMailer\PHPMailer\PHPMailer;
    use Exception;
    use stdClass;

    class Email 
    {
        /** @var PHPMailer */
        private $mail;

        /** @var stdClass */
        private $data;

        /** @var Exception */
        public $error;

        public function __construct()
        {
           $this->mail = new PHPMailer(true);
           $this->data = new stdClass();

          $this->mail->isSMTP();
          $this->mail->isHTML();
          $this->mail->setLanguage('br');

          $this->mail->SMTPAuth = true;
          $this->mail->SMTPSecure = 'ssl';
          $this->mail->CharSet = "utf-8";

          $this->mail->Host = MAIL['host'];
          $this->mail->Port = MAIL['port'];
          $this->mail->Username = MAIL['user'];
          $this->mail->Password = MAIL['passwd'];

        }

        public function add(String $subject, String $body,String $recipient_name, String $recipient_email): Email
        {
            $this->data->subject = $subject;
            $this->data->body = $body;
            $this->data->recipient_name = $recipient_name;
            $this->data->recipient_email = $recipient_email;

            return $this;
        }

        public function attach(String $filePath, String $fileName) : Email
        {
            $this->data->attach[$filePath] = $fileName;

            return $this;
        }

        public function send(String $from_name, String $from_email)
        {
            try {
                $this->mail->Subject = $this->data->subject;
                $this->mail->msgHTML($this->data->body);
                $this->mail->addAddress($this->data->recipient_email, $this->data->recipient_name);
                $this->mail->setFrom($from_email, $from_name); 

                if(!empty($this->data->attach))
                {
                    foreach( $this->data->attach as $path => $name)
                    {
                        $this->mail->addAttachment($path,$name);
                    }
                }
                $this->mail->send();

                return true;
            } catch (\Exception $e) {
                $this->error = $e;
                return false;
            }
        }
    }
