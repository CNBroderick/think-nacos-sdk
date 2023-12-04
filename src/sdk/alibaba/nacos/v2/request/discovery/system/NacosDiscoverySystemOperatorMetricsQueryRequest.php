<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\system;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\system\NacosDiscoverySystemOperatorMetricsQueryResponse;

/**
 * 查看系统当前数据指标
 * @package think\sdk\alibaba\nacos\v2\request\discovery\system
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查看系统当前数据指标
 */
class NacosDiscoverySystemOperatorMetricsQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->查询系统当前数据指标';

    protected string $uri = '/nacos/v2/ns/operator/metrics';
    protected string $method = 'GET';

    protected array $requireParams = [];
    protected array $optionalParams = [
        'onlyStatus' => '只显示状态，默认为true'
    ];

    public function request(array $addition_params = []): NacosDiscoverySystemOperatorMetricsQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoverySystemOperatorMetricsQueryResponse($response, $response_body);
    }

    /**
     * 只显示状态，默认为true
     * 当onlyStatus设置为true时，只返回表示系统状态的字符串
     * @param bool $onlyStatus
     * @return $this
     */
    public function paramOnlyStatus(bool $onlyStatus): NacosDiscoverySystemOperatorMetricsQueryRequest
    {
        self::param('onlyStatus', $onlyStatus);
        return $this;
    }
}