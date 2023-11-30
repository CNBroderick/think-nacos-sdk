<?php

namespace think\sdk\alibaba\nacos\v2\request\config\history;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\config\history\NacosConfigHistoryQueryResponse;

/**
 * 查询配置项历史版本。
 * @package think\sdk\alibaba\nacos\v2\request\config\history
 * @see https://nacos.io/zh-cn/docs/open-api.html 配置管理->查询历史版本
 */
class NacosConfigHistoryQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->查询历史版本';
    protected string $uri = '/nacos/v1/cs/history?search=accurate';
    protected string $method = 'GET';
    

    protected array $requireParams = [
        'dataId' => '配置 ID',
        'group' => '配置分组',
    ];
    protected array $optionalParams = [
        'tenant' => '租户信息，对应 Nacos 的命名空间ID字段',
        'pageNo' => '当前页码',
        'pageSize' => '分页条数(默认100条,最大为500)',
    ];

    /**
     * @param string $dataId
     * @param string $group
     */
    public function __construct(string $dataId, string $group)
    {
        self::build_params([
            'dataId' => $dataId,
            'group' => $group,
        ]);
    }

    public function request(array $addition_params = []): NacosConfigHistoryQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosConfigHistoryQueryResponse($response_body, $response);
    }

    /**
     * 租户信息，对应 Nacos 的命名空间ID字段（2.0.3起）
     * @param string $tenant
     * @return $this
     */
    public function paramTenant(string $tenant): NacosConfigHistoryQueryRequest {
        self::param('tenant', $tenant);
        return $this;
    }

    /**
     * 当前页码
     * @param int $pageNo
     * @return $this
     */
    public function paramPageNo(int $pageNo): NacosConfigHistoryQueryRequest {
        self::param('pageNo', $pageNo);
        return $this;
    }

    /**
     * 分页条数(默认100条,最大为500)
     * @param int $pageSize
     * @return $this
     */
    public function paramPageSize(int $pageSize): NacosConfigHistoryQueryRequest {
        self::param('pageSize', $pageSize);
        return $this;
    }
}