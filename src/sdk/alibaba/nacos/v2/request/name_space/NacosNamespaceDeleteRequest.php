<?php

namespace think\sdk\alibaba\nacos\v2\request\name_space;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 修改命名空间。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/open-api.html 命名空间->修改命名空间
 */
class NacosNamespaceDeleteRequest extends AbstractNacosRequest
{
    protected string $requestName = '命名空间->删除命名空间';
    protected string $uri = '/nacos/v1/console/namespaces';
    protected string $method = 'PUT';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'namespaceId'	=> '命名空间ID',
    ];
    protected array $optionalParams = [];

    public function __construct(string $namespace)
    {
        self::build_params([
            'namespace' => $namespace,
        ]);
    }


    public function request(array $addition_params = []): BoolResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new BoolResultNacosResponse($response_body, $response);
    }

}