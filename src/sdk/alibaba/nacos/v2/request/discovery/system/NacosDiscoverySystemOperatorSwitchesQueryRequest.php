<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\system;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\system\NacosDiscoverySystemOperatorSwitchesQueryResponse;

/**
 * 查询系统开关
 * @package think\sdk\alibaba\nacos\v2\request\discovery\system
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询系统开关
 */
class NacosDiscoverySystemOperatorSwitchesQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->查询系统开关';

    protected string $uri = '/nacos/v2/ns/operator/switches';
    protected string $method = 'GET';

    protected array $requireParams = [];
    protected array $optionalParams = [];


    public function request(array $addition_params = []): NacosDiscoverySystemOperatorSwitchesQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoverySystemOperatorSwitchesQueryResponse($response, $response_body);
    }
    
}