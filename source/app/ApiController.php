<?php 

    namespace Source\App;

    use PDO;    
    use Source\Support\Email;
    
    class ApiController extends PDO{

        public function __construct()
        {
            !session_start() && session_start();

            $this->conn = new \PDO("mysql:host=localhost;dbname=loginandregister", BD_USERNAME, BD_PASS);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        public function register($data){
            
            $_SESSION['temporaryRand'] = rand(11111,99999);

            if($this->verifyIfIsNotRegistered($data['email']) == 0){
                if($this->sendEmail($data['email'])) {
                    echo json_encode(true);
                }
                if($this->sendEmail($data['email']) == false) {
                    echo json_encode(false);
                }
            }
        }

        public function verifyRandAndMakeCadaster($data){
            // check if number reported is the same sent to email
            $isTheSameSentToEmail = intval($data['rand']) == $_SESSION['temporaryRand'];

            if($isTheSameSentToEmail){
                if($this->makeCadaster($data['email'],$data['username'],$data['passwd'])) 
                    echo json_encode(true);
            }else{
                echo json_encode(false);
            }

        }

        public function verifyIfIsNotRegistered($email)
        {
            $query = "SELECT id FROM users WHERE email = :e";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':e' => $email]);

            return $stmt->rowCount();
        }

        public function sendEmail($email)
        {
            
            $mail = new Email();
            $body = "<center>
                        <h1>Olá, esse é o seu codigo de verificação!</h1>
                        <h2>" . $_SESSION['temporaryRand']. "</h2>
                    </center>";
            $title = 'Email website Elegance - Codigo de verificação';
            $from = 'Elegance - Website';

            try {

                $mail->add($title, $body, $from, $email,)
                        ->send('Elegance.', 'elegance.website@hostgator.com');
                if(!$mail->error) {
                    return true;
                }
                return json_encode($mail->error->getMessage());

            } catch (\Exception $e) {
                return json_encode($e);
            }
        }


        public function makeCadaster($email,$username,$passwd)
        {
            $query = "INSERT INTO users (username, email, passwd) VALUES ('$username','$email','$passwd')";
            $stmt = $this->conn->prepare($query);

            if($stmt->execute()) {
                return json_encode(true);
            }

            return false;
        }
    }