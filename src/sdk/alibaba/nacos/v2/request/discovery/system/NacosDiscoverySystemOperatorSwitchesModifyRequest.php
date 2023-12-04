<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\system;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\OkResultNacosResponse;

/**
 * 查询系统开关
 * @package think\sdk\alibaba\nacos\v2\request\discovery\system
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询系统开关
 */
class NacosDiscoverySystemOperatorSwitchesModifyRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->查询系统开关';

    protected string $uri = '/nacos/v2/ns/operator/switches';
    protected string $method = 'GET';

    protected array $requireParams = [
        'entry' => '开关名',
        'value' => '开关值',
    ];
    protected array $optionalParams = [
        'debug' => '是否只在本机生效,true表示本机生效,false表示集群生效'
    ];
    


    public function __construct(string $entry, string $value)
    {
        self::build_params([
            'entry' => $entry,
            'value' => $value,
        ]);
    }

    public function request(array $addition_params = []): OkResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new OkResultNacosResponse($response, $response_body);
    }
    
    /**
     * 是否只在本机生效,true表示本机生效,false表示集群生效
     * @param bool $debug
     * @return $this
     */
    public function paramDebug(bool $debug): NacosDiscoverySystemOperatorSwitchesModifyRequest{
        self::param('debug', $debug);
        return $this;
    }
}