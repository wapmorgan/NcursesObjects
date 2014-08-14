<?php
namespace wapmorgan\NcursesObject;

class MouseEvents {
    /**
     * Button (1-4) released
     * @var int
     */
    const BUTTON1_RELEASED = NCURSES_BUTTON1_RELEASED;
    const BUTTON2_RELEASED = NCURSES_BUTTON2_RELEASED;
    const BUTTON3_RELEASED = NCURSES_BUTTON3_RELEASED;
    const BUTTON4_RELEASED = NCURSES_BUTTON4_RELEASED;

    /**
     * Button (1-4) pressed
     * @var int
     */
    const BUTTON1_PRESSED = NCURSES_BUTTON1_PRESSED;
    const BUTTON2_PRESSED = NCURSES_BUTTON2_PRESSED;
    const BUTTON3_PRESSED = NCURSES_BUTTON3_PRESSED;
    const BUTTON4_PRESSED = NCURSES_BUTTON4_PRESSED;

    /**
     * Button (1-4) clicked
     * @var int
     */
    const BUTTON1_CLICKED = NCURSES_BUTTON1_CLICKED;
    const BUTTON2_CLICKED = NCURSES_BUTTON2_CLICKED;
    const BUTTON3_CLICKED = NCURSES_BUTTON3_CLICKED;
    const BUTTON4_CLICKED = NCURSES_BUTTON4_CLICKED;

    /**
     * Button (1-4) double clicked
     * @var int
     */
    const BUTTON1_DOUBLE_CLICKED = NCURSES_BUTTON1_DOUBLE_CLICKED;
    const BUTTON2_DOUBLE_CLICKED = NCURSES_BUTTON2_DOUBLE_CLICKED;
    const BUTTON3_DOUBLE_CLICKED = NCURSES_BUTTON3_DOUBLE_CLICKED;
    const BUTTON4_DOUBLE_CLICKED = NCURSES_BUTTON4_DOUBLE_CLICKED;

    /**
     * Button (1-4) triple clicked
     * @var int
     */
    const BUTTON1_TRIPLE_CLICKED = NCURSES_BUTTON1_TRIPLE_CLICKED;
    const BUTTON2_TRIPLE_CLICKED = NCURSES_BUTTON2_TRIPLE_CLICKED;
    const BUTTON3_TRIPLE_CLICKED = NCURSES_BUTTON3_TRIPLE_CLICKED;
    const BUTTON4_TRIPLE_CLICKED = NCURSES_BUTTON4_TRIPLE_CLICKED;

    /**
     * Ctrl pressed during click
     * @var int
     */
    const BUTTON_CTRL = NCURSES_BUTTON_CTRL;

    /**
     * Shift pressed during click
     * @var int
     */
    const BUTTON_SHIFT = NCURSES_BUTTON_SHIFT;

    /**
     * Alt pressed during click
     * @var int
     */
    const BUTTON_ALT = NCURSES_BUTTON_ALT;

    /**
     * Report all mouse events
     * @var int
     */
    const ALL_MOUSE_EVENTS = NCURSES_ALL_MOUSE_EVENTS;

    /**
     * Report mouse position
     * @var int
     */
    const REPORT_MOUSE_POSITION = NCURSES_REPORT_MOUSE_POSITION;
}