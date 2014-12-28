<?php
namespace wapmorgan\NcursesObjects;

/**
 * A window object that implements functionality for ncurses window resource
 * @author wapmorgan (wapmorgan@gmail.com)
 */
class Window {
	/**
	 * ncurses window resource
	 */
	private $windowResource;
	/**
	 * associated Panel
	 */
	private $panel;
	/**
	 * cursor position
	 */
	private $cursorX;
	private $cursorY;

	const BORDER_STYLE_SOLID = 1; // ┐
	const BORDER_STYLE_DOUBLE = 2; // ╗
	const BORDER_STYLE_BLOCK = 3; // ■

	/**
	 * window geometry
	 */
	private $rows;
	private $columns;
	private $x;
	private $y;

    /**
     * @var WindowStyle
     */
    protected $style;

	/**
	 * Create a window
	 *
	 * @param int $columns
	 * @param int $rows
	 * @param int $x
	 * @param int $y
	 */
	public function __construct($columns = 0, $rows = 0, $x = 0, $y = 0) {
		$this->x = $x;
		$this->y = $y;
		$this->windowResource = ncurses_newwin($rows, $columns, $y, $x);
		if ($rows == 0 || $columns == 0)
			$this->getSize($columns, $rows);
		$this->columns = $columns;
		$this->rows = $rows;
	}

	/**
	 * Destructs a window and associated panel
	 */
	public function __destruct() {
		if ($this->panel !== null)
			$this->panel = null;
		ncurses_delwin($this->windowResource);
	}

	/**
	 * Returns a ncurses window resource
	 * @return resource
	 */
	public function getWindow() {
		return $this->windowResource;
	}

	/**
	 * Gets window size
	 * @param int $columns Will be filled with window columns
	 * @param int $rows Will be filled with window rows
	 * @return array An array with elements 'columns' and 'rows'
	 */
	public function getSize(&$columns = null, &$rows = null) {
		ncurses_getmaxyx($this->windowResource, $rows, $columns);
		return array('columns' => $columns, 'rows' => $rows);
	}

	/**
	 * Draws a border around this window
	 * @return Window This object
	 */
	public function border($left = 0, $right = 0, $top = 0, $bottom = 0, $tl_corner = 0, $tr_corner = 0, $bl_corner = 0, $br_corner = 0) {
		ncurses_wborder($this->windowResource, $left, $right, $top, $bottom, $tl_corner, $tr_corner, $bl_corner, $br_corner);
		return $this;
	}

	/**
	 * Draws a border with non-usual style
	 * @param integer $style Can be BORDER_STYLE_SOLID, BORDER_STYLE_DOUBLE or BORDER_STYLE_BLOCK
	 * @return Window This object
	 */
	public function borderStyle($style) {
		if ($style == self::BORDER_STYLE_SOLID) {
			$this->border();
		}
		elseif($style == self::BORDER_STYLE_DOUBLE) {
			$this->border(226, 186, 205, 205, 201, 187, 200, 188);
//            $this->border(ord('║'), ord('║'), ord('═'), ord('═'), ord('╔'), ord('╗'), ord('╚'), ord('╝'));
		}
		return $this;
	}

	/**
	 * Refreshes (redraws) a window
	 * @return Window This object
	 */
	public function refresh() {
		ncurses_wrefresh($this->windowResource);
		return $this;
	}

	/**
	 * Draws a window title
	 * @param string $title Title
	 * @return Window This object
	 */
	public function title($title) {
		$this->moveCursor(1, 0);
		$this->drawStringHere($title, NCURSES_A_REVERSE);
		return $this;
	}

	/**
	 * Draws a window status (a line at the bottom)
	 * @param string $status Status
	 * @return Window This object
	 */
	public function status($status) {
		$this->moveCursor(1, $this->rows -1 );
		$this->drawStringHere($status, NCURSES_A_REVERSE);
		return $this;
	}

	/**
	 * Erases a window
	 * @return Window This object
	 */
	public function erase() {
		ncurses_werase($this->windowResource);
		return $this;
	}

	/**
	 * Moves a cursor
	 * @param integer $x Cursor column
	 * @param integer $y Cursor row
	 * @return Window This object
	 */
	public function moveCursor($x, $y) {
		$this->cursorX = $x;
		$this->cursorY = $y;
		ncurses_wmove($this->windowResource, $y, $x);
		return $this;
	}

	/**
	 * Draws a string at current position
	 * @param string $string String
	 * @param integer $attributes Ncurses attributes (eg. NCURSES_A_REVERSE)
	 * @see http://pubs.opengroup.org/onlinepubs/007908799/xcurses/curses.h.html for available attributes (WA_LOW => NCURSES_A_LOW)
	 * @return Window This object
	 */
	public function drawStringHere($string, $attributes = 0) {
		ncurses_wattron($this->windowResource, $attributes);
		ncurses_waddstr($this->windowResource, $string);
		ncurses_wattroff($this->windowResource, $attributes);
		return $this;
	}

	/**
	 * @todo Delete
	 */
	public static function _debug() {
		$msg = '';

		foreach(func_get_args() as $arg) {
				$msg .= var_export($arg, true) . PHP_EOL;
		}

		file_put_contents('/tmp/ncurses.log', $msg);
	}

	/**
	 * Makes a panel associated with this window
	 * @return this
	 */
	public function makePanel() {
		$this->panel = new Panel($this);
		return $this;
	}

	/**
	 * Returns a Panel associated with this window
	 * @return Panel or null
	 */
	public function getPanel() {
		return $this->panel;
	}

	/**
	 * Makes a window that will be in center of the screen
	 * @param Window $parentWindow A window that will be major for new window
	 * @param integer $columns New window columns count
	 * @param integer $row New window rows count
	 * @return Window A new window that centered of parent window
	 */
	static public function createCenteredOf(Window $parentWindow, $columns, $rows) {
		$parentWindow->getSize($max_columns, $max_rows);
		return new Window($columns, $rows, ($max_columns / 2 - $columns / 2), ($max_rows / 2 - $rows / 2));
	}
}
