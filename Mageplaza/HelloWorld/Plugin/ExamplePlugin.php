<?php

namespace Mageplaza\HelloWorld\Plugin;

class ExamplePlugin
{

	public function beforeSetTitle(\Mageplaza\HelloWorld\Controller\Index\Index $subject, $title)
	{
		/* $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($title); */
		$title = $title . " to ";
		echo __METHOD__ . "</br>";

		return $title;
	}


/* 	public function afterGetTitle(\Mageplaza\HelloWorld\Controller\Index\Index $subject, $result)
	{
		echo $result;
		$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($result);
        echo __METHOD__ . "</br>";
        $result = $result . 'Mageplaza.com';
		return $result;
	} */


/* 	public function aroundGetTitle(\Mageplaza\HelloWorld\Controller\Index\Index $subject, callable $proceed)
	{

		echo __METHOD__ . " - Before proceed() </br>";
		 $result = $proceed();
		echo __METHOD__ . " - After proceed() </br>";


		return $result;
	} */

}