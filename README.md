Ncurses Objects
==================
This is a php library that provides ncurses functionality in OOP interface.

Basics
==================
1. There's 3 objects:
	1. Ncurses - the main object that provides general functionality of ncurses.
	2. Window - an object that provides functionality of ncurses windows.
	3. Panel - an object that provides functionality of windows panels. You have not to make these objects manual.
2. How it works: Init ncurses -> make windows -> fill windows -> refresh() -> update windows -> refresh() -> ...
3. Read comments and see examples
4. Ncurses in PHP tutorial: http://devzone.zend.com/173/using-ncurses-in-php/ (http://habrahabr.ru/post/186570/ on the russian).
5. Ncurses tutorial: http://invisible-island.net/ncurses/ncurses-intro.html, docs: http://pubs.opengroup.org/onlinepubs/007908799/xcurses/curses.h.html

How to use
==================
0. Include all files
1. Create the main object and setup it
```php
$ncurses = new Ncurses;
$ncurses
	->setEchoState(false)
	->setNewLineTranslationState(true)
	->setCursorState(Ncurses::CURSOR_INVISIBLE)
	->refresh();
```

2. Create the main window
```php
$mainWindow = new Window;
$mainWindow
	->border()
	->title('Hello! Today is '.date('d.m.Y'))
	->refresh();
```

3. Create a small window 10x10 in the center of the main window
```php
$window = Window::createCenteredOf($mainWindow, 10, 10);
$window
	->border()
	->moveCursor(3, 4)
	->drawStringHere('OK!')
	->refresh();
```

4. Wait for input to see windows
```php
$ncurses->inputChar();
```

5. Close ncurses session and clear the screen (you need do it manually if your script should show any data in normal mode)
```php
unset($ncurses);
```
