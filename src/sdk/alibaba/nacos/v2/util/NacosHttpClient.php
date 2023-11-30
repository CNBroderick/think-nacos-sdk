<?php

namespace think\sdk\alibaba\nacos\v2\util;

class NacosHttpClient
{

    private string $url;

    private string $body;
    private array $headers;

    private int $timeout = 30;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function query($query): NacosHttpClient
    {
        if ($query) {
            if (strpos('?', $this->url) === false) {
                $this->url .= '?';
            } else {
                $this->url .= '&';
            }
            $this->url .= $this->array_to_form_url($query);
        }
        return $this;
    }

    public function body($body_params): NacosHttpClient
    {
        if ($body_params) {
            $this->body = $this->array_to_form_url($body_params);
        }
        return $this;
    }

    public function header(array $headers): NacosHttpClient
    {
        if ($headers) $this->headers = $headers;
        return $this;
    }

    private function array_to_form_url($params): string
    {
        if (is_string($params)) {
            return $params;
        }
        if (is_array($params)) {
            $param_list = [];
            foreach ($params as $key => $value) {
                $param_list[] = urlencode($key) . '=' . urlencode($value);
            }
            return join('&', $param_list);
        }
        return '';
    }

    public function get(): array
    {
        return $this->request('GET');
    }

    public function post(): array
    {
        return $this->request('POST');
    }

    public function put(): array
    {
        return $this->request('PUT');
    }

    public function delete(): array
    {
        return $this->request('DELETE');
    }

    /**
     * @param string $method
     * @return array list($response, $body)
     */
    public function request(string $method): array
    {
        $method = strtoupper($method);

        $ch = curl_init();
        if (stripos($this->url, "https://") !== FALSE) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_URL, $this->url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = [];
        if ($this->body) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->body);
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        }
        if ($this->headers) {
            $headers = array_merge($headers, $this->headers);
        }

        if ($headers) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        switch ($method) {
            case 'GET':
                // nothing to do
                break;
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, true);
                break;
            case 'PUT':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                break;
            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
            default:
                abort(500, 'think-nacos-sdk：不支持的请求方法：' . $method);
        }
        $body = curl_exec($ch);
        $response = curl_getinfo($ch);
        curl_close($ch);

        return array($response, $body);
    }

}