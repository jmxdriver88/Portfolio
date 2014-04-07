ABSTRACT: I wrote Sudoku for a Java-class lab project. It is a simple, text-based program that allows the user to play a game of Sudoku through a text-based console window. 

REQUIREMENTS: These class files need to be compiled into some form of executable. (Recommend using Eclipse).

STARTING FILE: 'Play.java'

USE: The program provides instructions for the user as he plays the game, prompting for various inputs and displaying the current state of the puzzle through text output. The User is presented with these guidelines at the beginning:

 1. Numbers entered for rows, columns and values must
    be strictly integers from 1 to 9. If you receive
    an error message such as 'Invalid number', that is
    probably why.
 2. You will also receive an 'Invalid number' if you try
    to enter a number already represented by another
    cell in the same column, row, or box.
 3. Row and column indices range from 1 to 9 and start
    at the top and left side, respectively.
 4. At any time you may enter 'q' or 'quit' to end game.
 5. Instead of entering a number for a cell value, you
    may type 'h' or 'hint' to see all possible values,
    and 'r' or 'remove' to remove that particular value.

The player is then given the option of using the default initial grid or importing their own numbers. The program will then loop through prompts for row and column indices until the user solves the puzzle or quits. If the user quits an unfinished puzzle, the program will provide the option to solve the puzzle. If successful, it will print the result.