<?php
namespace wapmorgan\NcursesObjects;

/**
 * A panel object that implements functionality for ncurses panel resource
 * @author wapmorgan (wapmorgan@gmail.com)
 */
class Panel {
	/**
	 * Associated Window
	 */
	private $window;
	/**
	 * Ncurses panel resource
	 */
	private $panelResource;

	/**
	 * Constructor
	 * @param Window A window to associate
	 */
	public function __construct(Window $window) {
		$this->window = $window;
		$this->panelResource = ncurses_new_panel($window->getWindow());
		$this->_debug($this->window, $this->panelResource);
	}

	public static function _debug() {
		$msg = '';

		foreach(func_get_args() as $arg) {
				$msg .= var_export($arg, true) . PHP_EOL;
		}

		file_put_contents('/tmp/ncurses.log', $msg);
	}

	/**
	 * Shows a panel
	 * @return Panel This object
	 */
	public function show() {
		ncurses_show_panel($this->panelResource);
		return $this;
	}

	/**
	 * Hides a panel
	 * @return Panel This object
	 */
	public function hide() {
		ncurses_hide_panel($this->panelResource);
		return $this;
	}

	/**
	 * Puts a panel on the top
	 * @return Panel This object
	 */
	public function putOnTop() {
		ncurses_top_panel($this->panelResource);
		return $this;
	}

	/**
	 * Puts a panel on the bottom
	 * @return Panel This object
	 */
	public function putOnBottom() {
		ncurses_bottom_panel($this->panelResource);
		return $this;
	}
}
