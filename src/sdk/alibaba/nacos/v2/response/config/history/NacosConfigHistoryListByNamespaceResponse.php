<?php

namespace think\sdk\alibaba\nacos\v2\response\config\history;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosConfigHistoryListByNamespaceResponse extends JsonNacosResponse
{
    private array $list;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->list = [];
        foreach ($this->data as $pageItem) {
            $pageItem[] = new NacosConfigHistoryListResponsePageItem($pageItem);
        }
    }

    public function getList(): array
    {
        return $this->list;
    }
}