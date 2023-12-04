<?php

namespace think\sdk\alibaba\nacos\v2\request\config\history;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\config\history\NacosConfigHistoryDetailResponse;

/**
 * 查询配置上一版本信息(1.4起)
 *
 * 注意：2.0.3版本起，此接口需要新增字段tenant、dataId和group，其中tenant非必填。
 * @package think\sdk\alibaba\nacos\v2\request\config\history
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 配置管理->查询配置上一版本信息
 */
class NacosConfigHistoryPreviousRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->查询配置上一版本信息';
    protected string $uri = '/nacos/v2/cs/history/previous';
    protected string $method = 'GET';
    

    protected array $requireParams = [
        'dataId' => '配置分组名',
        'group' => '配置名',
        'nid' => '历史配置id',
    ];
    protected array $optionalParams = [
        'namespaceId' => "命名空间，默认为public与 ''相同",
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
        return new NacosConfigHistoryDetailResponse($response, $response_body);
    }

    /**
     * 命名空间，默认为public与 ''相同
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosConfigHistoryPreviousRequest{
        $this->params['namespaceId'] = $namespaceId;
        return $this;
    }
}