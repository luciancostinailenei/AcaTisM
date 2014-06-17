<?php

namespace Acatism\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security;

class ApplicationController extends Controller
{
    public function acceptAction($applicationId)
    {
    	if($this->get('security.context')->isGranted('ROLE_PROFESSOR') === true) 
    	{
    		$dm = $this->get('doctrine_mongodb')->getManager();
    		$application = $dm->getRepository('AcatismMainBundle:Application')
                        	  ->findOneBy(array('id' => $applicationId));

            if($this->getUser() === $application->getProfessor() && $application->getStatus() === 'UNPROCESSED') 
            {
            	$application->setStatus('WAITING_CONFIRMATION');
            	$dm->flush();
            }

            return $this->render($this->generateUrl('acatism_main_homepage'));
    	}
    	else
    	{
    		return $this->render($this->generateUrl('acatism_main_homepage'));
    	}
    }

    public function declineAction($applicationId)
    {
    	if($this->get('security.context')->isGranted('ROLE_PROFESSOR') === true) 
    	{
    		$dm = $this->get('doctrine_mongodb')->getManager();
    		$application = $dm->getRepository('AcatismMainBundle:Application')
                        	  ->findOneBy(array('id' => $applicationId));

            if($this->getUser() === $application->getProfessor() && $application->getStatus() === 'UNPROCESSED') 
            {
            	$application->setStatus('DECLINED');
            	$dm->flush();
            }

            return $this->render($this->generateUrl('acatism_main_homepage'));
    	}
    	else
    	{
    		return $this->render($this->generateUrl('acatism_main_homepage'));
    	}
    }

    public function confirmAction($applicationId)
    {
    	if($this->get('security.context')->isGranted('ROLE_STUDENT') === true) 
    	{
    		$dm = $this->get('doctrine_mongodb')->getManager();
    		$application = $dm->getRepository('AcatismMainBundle:Application')
                        	  ->findOneBy(array('id' => $applicationId));

            if($this->getUser() === $application->getStudent() && $application->getStatus()==='WAITING_CONFIRMATION') 
            {
            	$application->setStatus('ACCEPTED');
            	$dm->flush();
            }

            return $this->render($this->generateUrl('acatism_main_homepage'));
    	}
    	else
    	{
    		return $this->render($this->generateUrl('acatism_main_homepage'));
    	}
    }

}