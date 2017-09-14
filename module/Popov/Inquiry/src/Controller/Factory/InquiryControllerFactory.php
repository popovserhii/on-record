<?php

namespace Popov\Inquiry\Controller\Factory;

use Interop\Container\ContainerInterface;
use Dompdf\Dompdf;
use Popov\Inquiry\Controller\InquiryController;
use Popov\Inquiry\Service\InquiryService;

class InquiryControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $sm = $container->getServiceLocator();

        $fm = $sm->get('FormElementManager');
        // @todo use laze service https://blog.alejandrocelaya.com/2016/06/12/using-service-manager-3-lazy-services-to-improve-your-php-application-performance/
        $inquiryGridCallback = function() use ($sm) {
            return $sm->get('InquiryGrid');
        };

        $domPdf = new Dompdf();
        $domPdf->getOptions()->set('isHtml5ParserEnabled', true);

        /** @var InquiryService $service */
        $service = $sm->get(InquiryService::class);

        $controller = new InquiryController($fm, $service, $inquiryGridCallback, $domPdf);

        return $controller;
    }
}