<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Mailer\Mailer;
use App\Models\RequestModel;
use App\Models\UserModel;
use App\Requests\RequestRequest;

class ApiController extends Controller
{
    /**
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function actionSubmit()
    {
        $request = new RequestRequest();
        if ($request->isPost() AND $request->validate()) {
            $request_model = new RequestModel();
            $user_model = new UserModel();
            $user_model->name = $request->name;
            $user_model->email = $request->email;
            $user_model->save();
            $user_id = $user_model->id;

            $request_model->city_id = $request->city;
            $request_model->user_id = $user_id;
            $request_model->request = $request->request;
            $request_model->save();

            // Send mails
            $mailer = new Mailer(SMTP_CHARSET, SMTP_HOST, SMTP_USERNAME, SMTP_PASSWORD, SMTP_PORT, SMTP_SECURE, SMTP_EMAIL_FROM);
            // отправка письма клиенту
            $mailer->send($request->email, 'Уведомления о принятии заявки', '<h4>Ваша заявка принята!</h4>');
            // отправка письма сотруднику
            $mailer->send($request->email, 'Уведомления о новой заявке', "<p>Поступила новая заявка от $request->name 
                                        (email: $request->email, город: $request->city).</p><p>$request->request</p>");
            echo json_encode(['status' => 'ok']);
        } else {
            echo json_encode($request->getMessagesArray());
        }
    }
}