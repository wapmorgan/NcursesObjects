Ncurses Objects
==================
This is a php library that provides ncurses functionality in OOP interface.

[![Composer package](http://xn--e1adiijbgl.xn--p1acf/badge/wapmorgan/ncursesobjects)](https://packagist.org/packages/wapmorgan/ncursesobjects)
[![Latest Stable Version](https://poser.pugx.org/wapmorgan/ncursesobjects/v/stable)](https://packagist.org/packages/wapmorgan/ncursesobjects)
[![Total Downloads](https://poser.pugx.org/wapmorgan/ncursesobjects/downloads)](https://packagist.org/packages/wapmorgan/ncursesobjects)
[![License](https://poser.pugx.org/wapmorgan/ncursesobjects/license)](https://packagist.org/packages/wapmorgan/ncursesobjects)
[![Latest Unstable Version](https://poser.pugx.org/wapmorgan/ncursesobjects/v/unstable)](https://packagist.org/packages/wapmorgan/ncursesobjects)

1. Basics
2. Installation
3. Simple application example
4. Installation of ncurses binding

# Basics

![Structure](Structure.png)

1. There's 4 main classes:
	1. **Ncurses** - main object to act with Ncurses.
	2. **Window** - an object that represents a ncurses windows.
	3. **Panel** - an object that represents a window panels.
	4. **Terminal** - an object to act with Terminal
	
   And 4 additional classes:
   
   	1. **Colors** - all colors available in Ncurses
	2. **Keys** - all keys
	3. **MouseEvents** - all events from Mouse
	4. **WindowStyle** - a helper to create style of windows
2. How it works:
   1. ncurses initiation
   2. windows making & filling with text
   3. refresh() calling
   4. go to step **2**
3. Read comments and see examples
4. Ncurses in PHP tutorial: http://devzone.zend.com/173/using-ncurses-in-php/ ([on russian](http://habrahabr.ru/post/186570/)).
5. Ncurses tutorial: http://invisible-island.net/ncurses/ncurses-intro.html, docs: http://pubs.opengroup.org/onlinepubs/007908799/xcurses/curses.h.html

# Installation
Install it via Composer:
```
composer require wapmorgan/ncursesobjects dev-master
```

# Simple application example

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
    while (true) {
    	$ncurses->inputChar();
	sleep(1);
    }
    ```

5. Close ncurses session and clear the screen (you need do it manually if your script should show any data in normal mode)
    ```php
    unset($ncurses);
    ```

# Installation of ncurses binding

1. Install pecl. It is in a package named `php5-dev` in Ubuntu (`php-pear` in ArchLinux)
2. Install the ncurses binding.
    ```
    sudo pecl install ncurses
    ```

3. Include the php extension. Add follows in your php.ini:
    ```
    extension=ncurses.so
    ```
