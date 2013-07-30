<?php

/**
 * A ncurses object that implements functionality for main ncurses functions
 * @author wapmorgan (wapmorgan@gmail.com)
 */
class Ncurses {
	const KEY_LF = 10;
	const KEY_CR = 13;
	const KEY_ESC = 27;
	const KEY_TAB = 9;

	const CURSOR_INVISIBLE = 0;
	const CURSOR_NORMAL = 1;
	const CURSOR_VISIBLE = 2;

	/**
	 * Inits ncurses
	 */
	public function __construct() {
		$dir = dirname(__FILE__);
		require_once($dir.'/Window.php');
		require_once($dir.'/Panel.php');
		ncurses_init();
	}

	/**
	 * Destructs ncurses
	 */
	public function __destruct() {
		ncurses_end();
	}

	/**
	 * Sets echo state
	 * @param bool $state True of false
	 * @see http://www.php.net/manual/en/function.ncurses-echo.php
	 * @return Ncurses This object
	 */
	public function setEchoState($state) {
		if ($state)
			ncurses_echo();
		else
			ncurses_noecho();
		return $this;
	}

	/**
	 * Sets new-line translation state
	 * @param bool $state True of false
	 * @return Ncurses This object
	 */
	public function setNewLineTranslationState($state) {
		if ($state)
			ncurses_nl();
		else
			ncurses_nonl();
		return $this;
	}

	/**
	 * Sets cursor state
	 * @param integer $state CURSOR_INVISIBLE, CURSOR_NORMAL or CURSOR_VISIBLE
	 * @return Ncurses This object
	 */
	public function setCursorState($state) {
		ncurses_curs_set($state);
		return $this;
	}

	/**
	 * Moves the main cursor
	 * @param integer $y Row
	 * @param integer $x Column
	 * @return Ncurses This object
	 */
	public function moveOutput($y, $x) {
		ncurses_move($y, $x);
		return $this;
	}

	/**
	 * Refreshes the main window
	 * @return Ncurses This object
	 */
	public function refresh() {
		ncurses_refresh();
		return $this;
	}

	/**
	 * Lets the terminal beep
	 * @return Ncurses This object
	 */
	public function beep() {
		ncurses_beep();
		return $this;
	}

	/**
	 * Reads a char from keyboard
	 * @return int Ascii-code of char
	 * @see http://www.php.net/manual/en/ncurses.keyconsts.php for keys
	 */
	public function inputChar() {
		return ncurses_getch();
	}

	/**
	 * Refreshes the virtual screen to reflect the relations between panels in the stack
	 * and
	 * Write all prepared refreshes to terminal
	 */
	public function updatePanels() {
		ncurses_update_panels();
		ncurses_doupdate();
		return $this;
	}
}
