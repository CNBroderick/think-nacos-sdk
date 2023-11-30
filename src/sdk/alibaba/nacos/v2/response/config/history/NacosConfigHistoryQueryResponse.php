<?php

namespace think\sdk\alibaba\nacos\v2\response\config\history;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosConfigHistoryQueryResponse extends JsonNacosResponse
{
    private int $totalCount;
    private int $pageNumber;
    private int $pagesAvailable;
    private array $pageItems;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->totalCount = $this->data['totalCount'];
        $this->pageNumber = $this->data['pageNumber'];
        $this->pagesAvailable = $this->data['pagesAvailable'];
        $this->pageItems = [];
        foreach ($this->data['pageItems'] as $pageItem) {
            $pageItem[] = new NacosConfigHistoryQueryResponsePageItem($pageItem);
        }
    }

    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function getPagesAvailable(): int
    {
        return $this->pagesAvailable;
    }

    public function getPageItems(): array
    {
        return $this->pageItems;
    }
}