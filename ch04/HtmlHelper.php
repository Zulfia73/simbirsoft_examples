<?php

/**
 * Реализация простого html-хелпера
 */
class HtmlHelper
{
    /**
     * @var string
     */
    private $html = "";

    /**
     * Мета-вызов, имя функции используется как имя html-тэга,
     * второй как массив аргументов
     *
     * @param string $name
     * @param array $arguments
     *
     * @return HtmlHelper
     */
    public function __call($name, $arguments)
    {
        if (isset($arguments[0])) {
            $this->html .= self::tag($name, $arguments[0], isset($arguments[1]) ? $arguments[1] : '');
        } else {
            $this->html .= "<{$name}/>";
        }

        return $this;
    }

    /**
     * Отображение класса в строку
     */
    public function __toString()
    {
        return $this->html;
    }

    /**
     * Генерация html-тега
     *
     * @param string $tag_name
     * @param array|null $attributes
     * @param string $content
     *
     * @return string
     */
    public static function tag($tag_name, array $attributes = null, $content = '')
    {
        $result = "<{$tag_name}" . static::attributes($attributes) . ">{$content}</{$tag_name}>";

        return $result;
    }

    /**
     * Конвертор массива в строку атрибутов
     *
     * @param array $attributes
     *
     * @return string
     */
    public static function attributes(array $attributes)
    {
        $string = ' ';

        foreach ($attributes as $name => $value) {
            if ($name and $value) {
                $string .= "{$name}=\"" . htmlentities($value, ENT_COMPAT, 'UTF-8') . '"';
            } else {
                if (!$name and $value) {
                    $string .= "{$value}";
                }
            }
        }

        return $string;
    }
}

// test

$html = new HtmlHelper;

echo $html
        ->a(array('href' => "http://www.yandex.ru/"))
        ->br()
    . PHP_EOL;
