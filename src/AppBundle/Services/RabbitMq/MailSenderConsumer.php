<?php

namespace AppBundle\Services\RabbitMq;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;


/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/23/17
 * Time: 12:22
 */
class MailSenderConsumer implements ConsumerInterface
{
    /**
     * @param AMQPMessage $msg
     */
    public function execute(AMQPMessage $msg)
    {
        echo 'Ну тут типа сообщение пытаюсь отправить: '. $msg->getBody() . PHP_EOL;
        echo 'Отправлено успешно!...';
    }
}