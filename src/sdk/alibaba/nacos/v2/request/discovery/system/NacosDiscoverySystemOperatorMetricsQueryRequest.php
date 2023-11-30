<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\system;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\system\NacosDiscoverySystemOperatorMetricsQueryResponse;

/**
 * 查看系统当前数据指标
 * @package think\sdk\alibaba\nacos\v2\request\discovery\system
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->查看系统当前数据指标
 */
class NacosDiscoverySystemOperatorMetricsQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->查看系统当前数据指标';

    protected string $uri = '/nacos/v1/ns/operator/metrics';
    protected string $method = 'GET';

    protected array $requireParams = [];
    protected array $optionalParams = [];
    


    public function request(array $addition_params = []): NacosDiscoverySystemOperatorMetricsQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoverySystemOperatorMetricsQueryResponse($response_body, $response);
    }
}