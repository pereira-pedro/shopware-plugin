<?php

/**
 * PHP version 7.4
 *
 * @package   IxoraExtraText/Subscriber
 * @author    Pedro Pereira <pedro@pontonet.com>
 * @copyright 2022 Pedro Pereira
 * @license   https://pontonet.com/license PontoNET
 * @version   GIT: $Id$
 */
namespace IxoraExtraText\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Plugin\ConfigReader;

/**
 * Route subscriber for the plugin
 *
 * @package   IxoraExtraText/Subscriber
 * @author    Pedro Pereira <pedro@pontonet.com>
 * @copyright 2022 Pedro Pereira
 * @license   https://pontonet.com/license PontoNET
 * @version   GIT: $Id$
 */
class RouteSubscriber implements SubscriberInterface
{
    /**
     * Plugin path
     *
     * @var string
     */
    private $pluginDirectory;

    /**
     * Config reader object
     *
     * @var ConfigReader
     */
    private $config;

    /**
     * Constructor
     *
     * @param  string       $pluginName      The name of the plugin
     * @param  string       $pluginDirectory The localization of the plugin
     * @param  ConfigReader $configReader    Config reader
     */
    public function __construct($pluginName, $pluginDirectory, ConfigReader $configReader)
    {
        $this->pluginDirectory = $pluginDirectory;
        $this->config = $configReader->getByPluginName($pluginName);
    }


    /**
     * Bind event to local method
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onPostDispatch'
        ];
    }

  
    /**
     * Prepare the data to render
     *
     * @param  \Enlight_Controller_ActionEventArgs $args Arguments of the event
     *
     * @return void
     */
    public function onPostDispatch(\Enlight_Controller_ActionEventArgs $args)
    {
        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->get('subject');
        $view = $controller->View();

        $view->addTemplateDir($this->pluginDirectory . '/Resources/views');

        $view->assign('ixoraTextFontSize', $this->config['ixoraTextFontSize']);
        $view->assign('ixoraTextFontItalic', $this->config['ixoraTextFontItalic']);
        $view->assign('ixoraTextContent', $this->config['ixoraTextContent']);
    }
}
