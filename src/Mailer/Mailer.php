<?php


namespace App\Mailer;


use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class Mailer
 * @package App\Mailer
 * @property PHPMailer $mailer
 */
class Mailer
{
    private $mailer;

    /**
     * Mailer constructor.
     * @param string $charset
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $port
     * @param string $secure
     * @param string $email_from
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function __construct(string $charset, string $host, string $username, string $password, string $port, string $secure, string $email_from)
    {
        $this->mailer = new PHPMailer();
        $this->mailer->isSMTP();
        $this->mailer->CharSet = $charset;
        $this->mailer->Host = $host;
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $username;
        $this->mailer->Password = $password;
        $this->mailer->SMTPSecure = $secure;
        $this->mailer->Port = $port;
        $this->mailer->setFrom($email_from);
    }

    /**
     * @param string $email
     * @param string $subject
     * @param string $body
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function send(string $email, string $subject, string $body): bool
    {
        $this->mailer->addAddress($email);
        $this->mailer->isHTML(true);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        return $this->mailer->send();
    }
}