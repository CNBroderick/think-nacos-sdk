<?php

namespace think\sdk\alibaba\nacos\v2\request\auth;

use think\facade\Log;
use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\auth\NacosAuthLoginResponse;

/**
 * OpenAPI鉴权登录
 * @package think\sdk\alibaba\nacos\v2\request\auth
 * @see https://nacos.io/zh-cn/docs/auth.html OpenAPI鉴权登录
 */
class NacosAuthLoginRequest extends AbstractNacosRequest
{
    protected string $requestName = 'OpenAPI鉴权登录';

    protected string $uri = '/nacos/v1/auth/login';

    protected array $requireParams = [
        'username' => '用户名',
        'password' => '密码',
    ];
    protected bool $withAccessToken = false;
    protected bool $is_param_in_body = true;

    

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username = 'nacos', string $password = 'nacos')
    {
        Log::info('NacosAuthLoginRequest build param' );
        self::build_params([
            'username' => $username,
            'password' => $password,
        ]);
        Log::info('NacosAuthLoginRequest init' );
    }

    public function request(array $addition_params = []): NacosAuthLoginResponse
    {
        list($response, $body) = $this->doRequest($addition_params);
        Log::info('NacosAuthLoginRequest end request ' . $body);
        return new NacosAuthLoginResponse($response, $body);
    }

}