<?php
/**
 * Created by PhpStorm.
 * User: eastagile
 * Date: 9/24/14
 * Time: 5:43 PM
 */

namespace Common;

class Mail{
    /**
     * @param \Application\Controller\AbstractActionController $controller
     * @param $type
     * @param $sendTo
     * @param $variables
     */
    static public function sendMail($controller, $type, $sendTo, $variables){
        $entityManager = $controller->getEntityManager();
        /**
         * @var $emailTemplate \Admin\Entity\EmailTemplates
         */
        $emailTemplate = $entityManager->getRepository('Admin\Entity\EmailTemplates')->findOneBy(
            array(
                'type' => $type,
            )
        );
        $emailTemplate->send($controller, $sendTo, $variables);
    }
}