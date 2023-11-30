<?php

namespace think\sdk\alibaba\nacos\v2\request;

use think\sdk\alibaba\nacos\v2\auth\NacosTokenManager;
use think\sdk\alibaba\nacos\v2\config\NacosConfig;
use think\sdk\alibaba\nacos\v2\response\AbstractNacosResponse;
use think\sdk\alibaba\nacos\v2\util\NacosHttpClient;

abstract class AbstractNacosRequest
{

    /**
     * @var string 请求名称
     */
    protected string $requestName;

    /**
     * @var string 请求路径，以/开头
     */
    protected string $uri;

    /**
     * @var string 请求方法 GET | POST | PUT | DELETE
     */
    protected string $method = 'POST';

    /**
     * @var array 请求参数
     */
    protected array $params = [];

    /**
     * @var array 必填参数列表，如果没有填写则抛出异常
     */
    protected array $requireParams = [];

    /**
     * @var array 可选参数列表，如果没有填写则不传递
     */
    protected array $optionalParams = [];

    protected array $headers = [];

    /**
     * @var bool 是否默认携带access_token
     */
    protected bool $withAccessToken = true;

    private NacosConfig $config;

    protected bool $is_param_in_body = false;

    private function get_server_address(): string
    {
        $url = $this->config->isHttps() ? 'https' : 'http';
        $url .= '://';
        $url .= $this->config->getHost() ?: '127.0.0.1';
        $url .= ':';
        $url .= $this->config->getPort() ?: '8848';
        return $url;
    }

    public function setConfig(NacosConfig $config): void
    {
        $this->config = $config;
    }

    public function doRequest(array $addition_params = []): array
    {
        $this->config = NacosConfig::getInstance();

        $url = $this->get_server_address();
        if (strpos('/', $this->uri) !== 0) $url .= '/';
        $url .= $this->uri;

        $request = array_merge($this->params, $addition_params);
        $query = $this->is_param_in_body ? [] : $request;
        $body = $this->is_param_in_body ? $request : '';
        if ($this->config->isEnableAuth()) {
            $query['accessToken'] = NacosTokenManager::getInstance()->getAccessToken();
        }

        return (new NacosHttpClient($url))
            ->query($query)
            ->body($body)
            ->header($this->headers)
            ->request($this->method);
    }

    public abstract function request(array $addition_params = []): AbstractNacosResponse;

    /**
     * @param $params array 请求参数
     * @return void
     */
    protected function build_params(array $params = []): void
    {
        foreach ($this->requireParams as $param_key => $param_value) {
            array_key_exists($param_key, $params) or abort(500, 'think-nacos-sdk：' . $this->requestName . '[' . $this->uri . ']缺少必填参数：' . $param_key . '。');
            $this->params[$param_key] = is_array($param_value) ? json_encode($param_value) : $param_value;
        }

        foreach ($this->optionalParams as $param_key => $param_value) {
            // 如果参数已经在必填参数中存在，则不再添加
            if (array_key_exists($param_key, $this->requireParams)) continue;
            if (array_key_exists($param_key, $params)) $this->params[$param_key] = is_array($param_value) ? json_encode($param_value) : $param_value;
        }
    }


    /**
     * 添加一个请求参数，如果不在可选参数列表[optionalParams]中且确实需要，请将force=true
     * @param $param_key
     * @param $param_value
     * @param bool $force
     * @return AbstractNacosRequest
     */
    public function param($param_key, $param_value, bool $force = false): self
    {
        if ($force || array_key_exists($param_key, $this->optionalParams)) {
            $this->params[$param_key] = is_array($param_value) ? json_encode($param_value) : $param_value;
        }
        return $this;
    }


    /**
     * 添加一个请求参数，如果不在可选参数列表[optionalParams]中且确实需要，请将force=true
     * @param array $params
     * @param bool $force
     * @return AbstractNacosRequest
     */
    public function params(array $params, bool $force = false): self
    {
        foreach ($params as $key => $value) {
            $this->param($key, $value, $force);
        }
        return $this;
    }

}