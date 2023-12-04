<?php

namespace think\sdk\alibaba\nacos\v2\request\name_space;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 修改命名空间。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 命名空间->修改命名空间
 */
class NacosNamespaceModifyRequest extends AbstractNacosRequest
{
    protected string $requestName = '命名空间->修改命名空间';
    protected string $uri = '/nacos/v2/console/namespace';
    protected string $method = 'PUT';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'namespace' => '命名空间ID',
        'namespaceShowName' => '命名空间名',
    ];
    protected array $optionalParams = [
        'namespaceDesc' => '命名空间描述'
    ];

    public function __construct(string $namespace, string $namespaceShowName)
    {
        self::build_params([
            'namespace' => $namespace,
            'namespaceShowName' => $namespaceShowName,
        ]);
    }

    public function request(array $addition_params = []): BoolResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new BoolResultNacosResponse($response, $response_body);
    }

    /**
     * @param string $namespaceDesc 命名空间描述
     * @return $this
     */
    public function paramNamespaceDesc(string $namespaceDesc): NacosNamespaceModifyRequest
    {
        $this->params['namespaceDesc'] = $namespaceDesc;
        return $this;
    }
}