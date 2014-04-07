import java.util.Scanner;

/**
 * Allows a user to play the game Sudoku.
 * @author Josiah Driver
 * @since 03/15/13
 * Class: Intermediate Java
 * Assignment: (Lab2) Create a representation of a Sudoku puzzle game.
 */
public class Play
{
    private final static int GRID_SIZE = 9;

    public static void main(String[] args)
    {
        boolean playAgain = true;
        while(playAgain)
        {
            System.out.println("Welcome to Sudoku! A few guidelines before you start:");
            System.out.println(" 1. Numbers entered for rows, columns and values must");
            System.out.println("    be strictly integers from 1 to 9. If you receive");
            System.out.println("    an error message such as 'Invalid number', that is");
            System.out.println("    probably why.");
            System.out.println(" 2. You will also receive an 'Invalid number' if you try");
            System.out.println("    to enter a number already represented by another");
            System.out.println("    cell in the same column, row, or box.");
            System.out.println(" 3. Row and column indices range from 1 to 9 and start");
            System.out.println("    at the top and left side, respectively.");
            System.out.println(" 4. At any time you may enter 'q' or 'quit' to end game.");
            System.out.println(" 5. Instead of entering a number for a cell value, you");
            System.out.println("    may type 'h' or 'hint' to see all possible values,");
            System.out.println("    and 'r' or 'remove' to remove that particular value.\n");

            // Start game and print grid
            Sudoku game = startGame();
            game.printMySudoku();

            // Play game
            game = playGame(game);
            
            Scanner in = new Scanner(System.in);

            if(game.win())
            {
                System.out.println("Congratulations, you won!");
            }
            
            else
            {
                System.out.println("\nSorry, you didn't win. Would you like the program");
                System.out.print("to solve the puzzle for you? ('y' or 'n'): ");
                if(evaluateCommand(in.next(), "yes"))
                {
                    if(game.solve())
                    {
                        System.out.println("\nHere is the answer: ");
                        game.printMySudoku();
                    }
                    
                    else
                    {
                        System.out.println("\nThe program was unable to solve the puzzle.");
                        System.out.println("This was as far as it got: ");
                        game.printMySudoku();
                    }
                }
            }
            
            System.out.print("\nPlay again? ('y' or 'n'): ");
            
            // Run loop again if player responds yes
            playAgain = evaluateCommand(in.next(), "yes");
            
            // Make some room in the console.
            System.out.println("\n");
        }

        System.out.println("Thanks for playing!");
    }
    
    /**
     * Initializes the Sudoku object to "set", initial values.
     * @return the Sudoku object.
     */
    public static Sudoku startGame()
    {
        Sudoku game;
        Scanner in = new Scanner(System.in);

        System.out.print("Use default initial numbers? ('y' or 'n'): ");

        // If no, prompt user to fill in the array
        if(!evaluateCommand(in.next(), "yes"))
        {
            System.out.println("Very well. It may take a while.");
            game = new Sudoku();
            boolean valid = false;

            for(int i = 0; i < GRID_SIZE; i++)
            {
                for(int j = 0; j < GRID_SIZE; j++)
                {
                    valid = false;
                    while(!valid)
                    {
                        System.out.print("Enter value for cell[" + (i + 1)
                                + ", " + (j + 1) + "] ('0' for blank): ");

                        if(in.hasNextInt())
                        {
                            if(game.insertSetVal(i, j, in.nextInt()))
                            {
                                valid = true;
                            }
                            
                            else
                            {
                                System.out.print("Invalid number. ");
                            }
                        }

                        else
                        {
                            System.out.print("Invalid data. ");
                            in.next(); // Clear console
                        }
                    }
                }
            }
        }

        // Otherwise, construct the default array
        else
        {
            int[][] initialGrid = {
                    {5, 3, 0, 0, 7, 0, 0, 0, 0},
                    {6, 0, 0, 1, 9, 5, 0, 0, 0},
                    {0, 9, 8, 0, 0, 0, 0, 6, 0},
                    {8, 0, 0, 0, 6, 0, 0, 0, 3},
                    {4, 0, 0, 8, 0, 3, 0, 0, 1},
                    {7, 0, 0, 0, 2, 0, 0, 0, 6},
                    {0, 6, 0, 0, 0, 0, 2, 8, 0},
                    {0, 0, 0, 4, 1, 9, 0, 0, 5},
                    {0, 0, 0, 0, 8, 0, 0, 7, 9}
            };

            game = new Sudoku(initialGrid);
        }

        return game;
    }

    /**
     * Actually plays the game by prompting for and receiving
     * user input in the console window.
     * @param game the Sudoku game object
     * @return the Sudoku game object
     */
    public static Sudoku playGame(Sudoku game)
    {
        // Initialize variables
        int row = -1;
        int col = -1;
        int val = -1;
        boolean done = false;
        boolean invalid = true;
        Scanner in = new Scanner(System.in);
        
        while(!done)
        {
            // Get row number. Assume invalidity at first.
            invalid = true;
            while(invalid)
            {
                System.out.print("Please enter a row index (1-9): ");
                
                if(in.hasNextInt())
                {
                    row = in.nextInt() - 1; // Convert to counting from 0   
                    
                    if(row < 0 || row >= GRID_SIZE)
                    {
                        System.out.print("Invalid number. ");
                    }
                    
                    else
                    {
                        invalid = false;
                    }
                }

                else if(evaluateCommand(in.next(), "quit"))
                {
                    return game;
                }
                
                else
                {
                    System.out.print("Invalid number. ");
                }
            }

            // Get column number. Assume invalidity at first.
            invalid = true;
            while(invalid)
            {
                System.out.print("Please enter a column index (1-9): ");
                
                if(in.hasNextInt())
                {
                    col = in.nextInt() - 1; // Convert to counting from 0   
                    
                    if(col < 0 || col >= GRID_SIZE)
                    {
                        System.out.print("Invalid number. ");
                    }
                    
                    else
                    {
                        invalid = false;
                    }
                }

                else if(evaluateCommand(in.next(), "quit"))
                {
                    return game;
                }
                
                else
                {
                    System.out.print("Invalid number. ");
                }
            }
            
            // Get value number. Assume invalidity at first.
            invalid = true;
            while(invalid)
            {
                System.out.print("Please enter a value ('h' for hint, 'r' to remove): ");
                
                if(in.hasNextInt())
                {
                    val = in.nextInt();  
                    
                    if(val < 1 || val > GRID_SIZE)
                    {
                        System.out.print("Invalid number. ");
                    }
                    
                    else
                    {
                        invalid = false;
                    }
                }

                // Otherwise, input must be a letter command.
                else
                {
                    String response = in.next();
                    
                    if(evaluateCommand(response, "hint"))
                    {
                        printHints(game.hint(row, col));
                    }
                    
                    else if(evaluateCommand(response, "remove"))
                    {
                        invalid = false;
                        val = -1; // Change to a sentinel value.
                    }
                
                    else if(evaluateCommand(response, "quit"))
                    {
                        return game;
                    }
                }
            }
                
            // Sentinel number indicating value must be removed.
            if(val == -1)
            {
                if(game.removeVal(row, col))
                {
                    System.out.println("Value successfully removed.");
                }

                else
                {
                    System.out.println("Unable to remove. Cell may be a permanant number.");
                }
            }

            // Otherwise, value must be valid
            else
            {
                if(!game.insertVal(row, col, val))
                {
                    System.out.println("Invalid. Number is the same as another number in the");
                    System.out.println("same row, column, or box; or cell may be permanently set.");
                }
            }

            // Print game's current status and check if game is over.
            game.printMySudoku();
            done = game.win();
        }
        
        return game;
    }
    
    /**
     * Checks if a command conveys the meaning of the check word
     * by seeing if it equals the check word or it's first letter.
     * @param command The given command, probably user-inputed
     * @param checkWord The word to check the command against
     * @return true if it does convey the same meaning, false if not
     */
    public static boolean evaluateCommand(String command, String checkWord)
    {
        String firstLetter = checkWord.substring(0, 1);
        
        return command.equalsIgnoreCase(firstLetter)
                || command.equalsIgnoreCase(checkWord);
    }
        
    /**
     * Prints a passed array of hints in user-readable format.
     * @param hints an array of possible values
     */
    public static void printHints(int[] hints)
    {
        System.out.print("Possible values for this cell: ");
        
        if(hints.length == 0)
        {
            System.out.print("none");
        }

        for(int i = 0; i < hints.length; i++)
        {
            if(i > 0)
            {
                System.out.print(", ");
            }

            System.out.print(hints[i]);
        }

        System.out.println();
    }
}