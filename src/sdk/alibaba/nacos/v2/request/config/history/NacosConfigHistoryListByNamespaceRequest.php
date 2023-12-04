<?php

namespace think\sdk\alibaba\nacos\v2\request\config\history;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\config\history\NacosConfigHistoryListByNamespaceResponse;

/**
 * 获取指定命名空间下的配置信息列表
 * @package think\sdk\alibaba\nacos\v2\request\config\history
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 配置管理->查询指定命名空间下的配置列表
 */
class NacosConfigHistoryListByNamespaceRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->查询指定命名空间下的配置列表';
    protected string $uri = '/nacos/v2/cs/history/list';
    protected string $method = 'GET';


    protected array $requireParams = [
        'namespaceId' => "命名空间，默认为public与 ''相同",
    ];
    protected array $optionalParams = [];

    /**
     * @param string $namespaceId
     */
    public function __construct(string $namespaceId)
    {
        self::build_params([
            'namespaceId' => $namespaceId,
        ]);
    }

    public function request(array $addition_params = []): NacosConfigHistoryListByNamespaceResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosConfigHistoryListByNamespaceResponse($response, $response_body);
    }
}