<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 15.08.14
 * Time: 14:04
 */

namespace wapmorgan\NcursesObjects;


class WindowStyle {

    /**
     * @var string
     */
    const BORDER_STYLE_SOLID = 'solid';
    /**
     * @var string
     */
    const BORDER_STYLE_DOUBLE = 'double';
    /**
     * @var string
     */
    const BORDER_STYLE_BLOCK = 'block';

    /**
     * @var int
     */
    protected $borderWidth = 1;

    /**
     * @var string
     */
    protected $borderStyle = 'solid';

    /**
     * @param $style
     */
    public function setBorderStyle($style) {
        $enum = array(self::BORDER_STYLE_SOLID, self::BORDER_STYLE_DOUBLE, self::BORDER_STYLE_BLOCK);
        if (in_array($style, $enum))
            $this->borderStyle = $style;
    }

    /**
     * @return string
     */
    public function getBorderStyle() {
        return $this->borderStyle;
    }

    /**
     * @param $width
     */
    public function setBorderWidth($width) {
        $width = intval($width, 10);
        if ($width > 1) {
            $this->borderWidth = $width;
        }
    }

    /**
     * @return int
     */
    public function getBorderWidth() {
        return $this->borderWidth;
    }
}
