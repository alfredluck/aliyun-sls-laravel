<?php

namespace Alfredlib\AliyunSls;

class AliyunLogger
{
    private $logger;


    /**
     * Create a logger and boot.
     *
     * @param string $logstore
     * @return $this
     * @throws \Exception
     */
    public function logger(string $logstore = '')
    {
        $endpoint      = config('aliyunsls.endpoint');
        $access_key    = config('aliyunsls.access_key');
        $access_secret = config('aliyunsls.access_secret');
        $project       = config('aliyunsls.project');
        $logstore      = $logstore ?: config('aliyunsls.default_logstore');

        try {
            $registry_key = 'aliyun_sls_logger';
            if (Registry::isExist($registry_key)) {
                $this->logger = Registry::get($registry_key);
            } else {
                $client       = new \Aliyun_Log_Client($endpoint, $access_key, $access_secret);
                $this->logger = \Aliyun_Log_LoggerFactory::getLogger($client, $project, $logstore);
                Registry::set($registry_key, $this->logger);
            }
            return $this;
        } catch (Exception $exception) {
            //write laravel.log
        }

        return $this;
    }


    /**
     * Write a log of the 'info' level.
     *
     * @param string $title
     * @param array $context
     * @return bool
     */
    public function info(string $title, array $context = [])
    {
        try {
            $this->logger();
            $context['title'] = $title;
            $this->logger->infoArray($context);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }

    /**
     * Write a log of the 'warning' level.
     *
     * @param string $title
     * @param array $context
     * @return bool
     */
    public function warning(string $title, array $context = [])
    {
        try {
            $this->logger();
            $context['title'] = $title;
            $this->logger->warnArray($context);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }

    /**
     * Write a log of the 'error' level.
     *
     * @param string $title
     * @param array $context
     * @return bool
     */
    public function error(string $title, array $context = [])
    {
        try {
            $this->logger();
            $context['title'] = $title;
            $this->logger->errorArray($context);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }

    /**
     * Write a log of the 'debug' level.
     *
     * @param string $title
     * @param array $context
     * @return bool
     */
    public function debug(string $title, array $context = [])
    {
        try {
            $this->logger();
            $context['title'] = $title;
            $this->logger->debugArray($context);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }


}
