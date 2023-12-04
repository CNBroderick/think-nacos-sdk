<?php

namespace think\sdk\alibaba\nacos\v2\request\config\history;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\config\history\NacosConfigHistoryListResponse;

/**
 * 查询配置项历史版本。
 * @package think\sdk\alibaba\nacos\v2\request\config\history
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 配置管理->查询配置历史列表
 */
class NacosConfigHistoryListRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->查询配置历史列表';
    protected string $uri = '/nacos/v2/cs/history/list';
    protected string $method = 'GET';
    

    protected array $requireParams = [
        'dataId' => '配置 ID',
        'group' => '配置分组',
    ];
    protected array $optionalParams = [
        'namespaceId' => "命名空间，默认为public与 ''相同",
        'pageNo' => '当前页，默认为1',
        'pageSize' => '页条目数，默认为100，最大为500',
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

    public function request(array $addition_params = []): NacosConfigHistoryListResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosConfigHistoryListResponse($response, $response_body);
    }

    /**
     * 命名空间，默认为public与 ''相同
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosConfigHistoryListRequest{
        $this->params['namespaceId'] = $namespaceId;
        return $this;
    }

    /**
     * 当前页，默认为1
     * @param int $pageNo
     * @return $this
     */
    public function paramPageNo(int $pageNo): NacosConfigHistoryListRequest
    {
        $this->params['pageNo'] = $pageNo;
        return $this;
    }

    /**
     * 页条目数，默认为100，最大为500
     * @param int $pageSize
     * @return $this
     */
    public function paramPageSize(int $pageSize): NacosConfigHistoryListRequest
    {
        $this->params['pageSize'] = $pageSize;
        return $this;
    }
}