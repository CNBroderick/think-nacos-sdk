<?php

namespace think\sdk\alibaba\nacos\v2\request\config\history;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\config\history\NacosConfigHistoryDetailResponse;

/**
 * 查询配置项历史版本详情
 *
 * 注意：2.0.3版本起，此接口需要新增字段tenant、dataId和group，其中tenant非必填。
 * @package think\sdk\alibaba\nacos\v2\request\config\history
 * @see https://nacos.io/zh-cn/docs/open-api.html 配置管理->查询历史版本详情
 */
class NacosConfigHistoryDetailRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->查询历史版本详情';
    protected string $uri = '/nacos/v1/cs/history';
    protected string $method = 'GET';
    

    protected array $requireParams = [
        'dataId' => '配置ID（2.0.3起）',
        'group' => '配置分组（2.0.3起）',
        'nid' => '配置项历史版本ID',
    ];
    protected array $optionalParams = [
        'tenant' => '租户信息，对应 Nacos 的命名空间ID字段（2.0.3起）',
    ];

    /**
     * @param string $dataId 配置ID
     * @param string $group 配置分组
     * @param int $nid 配置项历史版本ID
     */
    public function __construct(string $dataId, string $group, int $nid)
    {
        self::build_params([
            'dataId' => $dataId,
            'group' => $group,
            'nid' => $nid,
        ]);
    }

    public function request(array $addition_params = []): NacosConfigHistoryDetailResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosConfigHistoryDetailResponse($response_body, $response);
    }

    /**
     * 租户信息，对应 Nacos 的命名空间ID字段（2.0.3起）
     * @param string $tenant
     * @return $this
     */
    public function paramTenant(string $tenant): NacosConfigHistoryDetailRequest {
        self::param('tenant', $tenant);
        return $this;
    }
}