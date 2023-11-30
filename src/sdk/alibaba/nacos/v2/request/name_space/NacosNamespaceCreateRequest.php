<?php

namespace think\sdk\alibaba\nacos\v2\request\name_space;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 创建命名空间。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/open-api.html 命名空间->创建命名空间
 */
class NacosNamespaceCreateRequest extends AbstractNacosRequest
{
    protected string $requestName = '命名空间->创建命名空间';
    protected string $uri = '/nacos/v1/console/namespaces';
    protected string $method = 'POST';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'customNamespaceId' => '命名空间ID',
        'namespaceName' => '命名空间名',
        'namespaceDesc' => '命名空间描述',
    ];
    protected array $optionalParams = [];

    public function __construct(string $customNamespaceId, string $namespaceName, string $namespaceDesc)
    {
        self::build_params([
            'customNamespaceId' => $customNamespaceId,
            'namespaceName' => $namespaceName,
            'namespaceDesc' => $namespaceDesc,
        ]);
    }


    public function request(array $addition_params = []): BoolResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new BoolResultNacosResponse($response_body, $response);
    }
}