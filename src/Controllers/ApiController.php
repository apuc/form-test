<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\RequestModel;
use App\Models\UserModel;
use App\Requests\RequestRequest;
use App\Services\Mailer;

/**
 * Class ApiController
 * @package App\Controllers
 */
class ApiController extends Controller
{
    /**
     * Insert data from form to database
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function actionSubmit(): void
    {
        $request = new RequestRequest();
        if ($request->isPost() AND $request->validate()) {
            $user_id = UserModel::insertUser(strip_tags($request->name), strip_tags($request->email));
            RequestModel::insertRequest($request->city, $user_id, $request->request);
            $this->sendMails($request);
            echo json_encode(['status' => 'ok']);
        } else {
            echo json_encode($request->getMessagesArray());
        }
    }


    /**
     * Send mails to client and worker
     * @param $request
     * @throws \PHPMailer\PHPMailer\Exception
     */
    private function sendMails($request): void
    {
        // Send mails
        $mailer = new Mailer(SMTP_CHARSET, SMTP_HOST, SMTP_USERNAME, SMTP_PASSWORD, SMTP_PORT, SMTP_SECURE, SMTP_EMAIL_FROM);
        // отправка письма клиенту
        $mailer->send($request->email, 'Уведомления о принятии заявки', '<h4>Ваша заявка принята!</h4>');
        // отправка письма сотруднику
        $mailer->send($request->email, 'Уведомления о новой заявке', "<p>Поступила новая заявка от $request->name 
                                        (email: $request->email, город: $request->city).</p><p>$request->request</p>");
    }
}
