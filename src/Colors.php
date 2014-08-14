<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 14.08.14
 * Time: 22:04
 */

namespace wapmorgan\NcursesObjects;


class Colors {
    /**
     * No color (black)
     * @var int
     */
    const COLOR_BLACK = NCURSES_COLOR_BLACK;

    /**
     * White
     * @var int
     */
    const COLOR_WHITE = NCURSES_COLOR_WHITE;

    /**
     * Red - supported when terminal is in color mode
     * @var int
     */
    const COLOR_RED = NCURSES_COLOR_RED;

    /**
     * Green - supported when terminal is in color mode
     * @var int
     */
    const COLOR_GREEN = NCURSES_COLOR_GREEN;

    /**
     * Yellow - supported when terminal is in color mode
     * @var int
     */
    const COLOR_YELLOW = NCURSES_COLOR_YELLOW;

    /**
     * Blue - supported when terminal is in color mode
     * @var int
     */
    const COLOR_BLUE = NCURSES_COLOR_BLUE;

    /**
     * Cyan - supported when terminal is in color mode
     * @var int
     */
    const COLOR_CYAN = NCURSES_COLOR_CYAN;

    /**
     * Magenta - supported when terminal is in color mode
     * @var int
     */
    const COLOR_MAGENTA = NCURSES_COLOR_MAGENTA;
} 