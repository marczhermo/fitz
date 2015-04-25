<?php namespace Fitz\Configs;

use Fitz\Abstracts\Properties\ClassPathTrait;

class ClassPaths
{

    /**
     * Properties were defined using traits for code re-usability
     * A convention similar to using interfaces as contracts or ISP
     */
    use ClassPathTrait;

    /**
     * @return array List of classes
     */
    public static function Classes()
    {
        return self::$classes = array(
            'Request'    => 'Fitz\Requests\Request',
            'Session'    => 'Fitz\Sessions\Session',
            'HttpHeader' => 'Fitz\Repositories\HttpHeader',
            'Inspector'  => 'Fitz\Libraries\Reflections\Inspector'
        );
    }

    /**
     * @return array List of abstracts / interfaces
     */
    public static function Abstracts()
    {
        return self::$abstracts = array(
            'Request'    => 'Fitz\Abstracts\RequestInterface',
            'Session'    => 'Fitz\Abstracts\SessionInterface',
            'HttpHeader' => 'Fitz\Abstracts\HttpHeaderInterface'
        );
    }

    /**
     * @return array List of filter classes paths
     */
    public static function Filters()
    {
        return self::$filters = array(
            'Home@index' => array(
                'Fitz\Filters\Validations\HomeFilter',
                'Fitz\Filters\Permissions\HomePermission'
            )
        );
    }

    public static function Events()
    {
        return self::$events = array(
            'Home@index' => array(
                'Fitz\Events\Sample\HomeEvent'
            )
        );
    }

}