import java.util.Arrays;

/**
 * Class that stores and performs a session of the game Sudoku.
 * @author Josiah Driver
 * @since 03/15/13
 * Class: Intermediate Java
 * Assignment: (Lab2) Create a representation of a Sudoku puzzle game.
 */
public class Sudoku
{
    private final static int GRID_SIZE = 9;
    private final static int BOX_SIZE = GRID_SIZE / 3;
    private final static int MAX_SET_VALUES = GRID_SIZE * GRID_SIZE;

    // The main grid on which the numbers will be held.
    private static int[][] grid = new int[GRID_SIZE][GRID_SIZE];

    // Stores whether or not an index in the main grid holds a set,
    // initial value.
    private static boolean[][] numberIsSet = new boolean[GRID_SIZE][GRID_SIZE];

    // The number of currently "filled" cells - used to determine
    // if the game is done
    private static int filledValues = 0;

    /**
     * A constructor to set up an empty grid
     */
    public Sudoku()
    {
        for(int i = 0; i < GRID_SIZE; i++)
        {
            for(int j = 0; j < GRID_SIZE; j++)
            {
                grid[i][j] = 0;
                numberIsSet[i][j] = false;
            }
        }
    }

    /**
     * A constructor to set up a parameter-passed grid
     * @param initalValues The set, initial numbers the Sudoku game will have.
     */
    public Sudoku(int[][] initialValues)
    {
        for(int i = 0; i < GRID_SIZE; i++)
        {
            for(int j = 0; j < GRID_SIZE; j++)
            {
                // Copy cell value from parameter to grid
                grid[i][j] = initialValues[i][j];

                // Make cell value in grid "set" (true) if value
                // is an initial value (doesn't equal 0)
                if(initialValues[i][j] != 0)
                {
                    numberIsSet[i][j] = true;
                    filledValues++;
                }

                else
                {
                    numberIsSet[i][j] = false;
                }
            }
        }
    }

    /**
     * Prints the Sudoku game as it currently stands.
     */
    public void printMySudoku()
    {        
        // Make an adjustable horizontal border
        String border = "";
        for(int i = 0; i < GRID_SIZE; i++)
        {
            if(i % BOX_SIZE == 0)
            {
                border += "+-";
            }

            border += "--";
        }
        border += "+";

        System.out.print(border);

        for(int i = 0; i < GRID_SIZE; i++)
        {
            System.out.print("\n|");

            for(int j = 0; j < GRID_SIZE; j++)
            {
                // If a number is a zero, print a space instead
                if(grid[i][j] == 0)
                {
                    System.out.print("  ");
                }

                else
                {
                    System.out.print(" " + grid[i][j]);
                }

                // Print box separators
                if((j + 1) % BOX_SIZE == 0)
                {
                    System.out.print(" |");
                }
            }

            // Print box separators
            if((i + 1) % BOX_SIZE == 0)
            {
                System.out.print("\n" + border);
            }
        }

        System.out.println("\n");
    }

    /**
     * Inserts a value into the Sudoku grid.
     * @param row The row index of the cell to be filled
     * @param col The column index of the cell to be filled
     * @param val The value to fill the cell
     * @return true if able to insert value, false if not
     */
    public boolean insertVal(int row, int col, int val)
    {
        // Ensure valid indexes
        if((row < 0 || row > GRID_SIZE - 1) || (col < 0 || col > GRID_SIZE - 1))
        {
            return false;
        }

        // Ensure valid value
        else if(val < 1 || val > GRID_SIZE)
        {
            return false;
        }

        // Ensure cell is not already filled
        else if(grid[row][col] != 0)
        {
            return false;
        }

        // Check the rules of the game
        else if(!checkRow(row, val) || !checkCol(col, val) || !checkBox(row, col, val))
        {
            return false;
        }

        grid[row][col] = val;
        filledValues++;

        return true;
    }

    /**
     * Inserts a set, initial value into the Sudoku grid.
     * Used for allowing a user to input their own initial values.
     * @param row The row index of the cell to be set
     * @param col The column index of the cell to be set
     * @param val The value to set the cell
     * @return true if able to set initial value, false if not
     */
    public boolean insertSetVal(int row, int col, int val)
    {        
        // Assume value was meant to be left blank
        if(val == 0)
        {
            return true;
        }

        else if(!insertVal(row, col, val))
        {
            return false;
        }

        // The difference between this method and insertVal
        // is that this method makes the value "set", or permanent.
        numberIsSet[row][col] = true;

        return true;
    }

    /**
     * Removes a value from the Sudoku grid.
     * @param row The row index of the cell to be removed
     * @param col The column index of the cell to be removed
     * @return true if able to remove value, false if not
     */
    public boolean removeVal(int row, int col)
    {
        // Ensure valid indexes
        if((row < 0 || row > GRID_SIZE - 1) || (col < 0 || col > GRID_SIZE - 1))
        {
            return false;
        }

        // Ensure cell is not a fixed, "set" value
        else if(numberIsSet[row][col])
        {
            return false;
        }

        grid[row][col] = 0;
        filledValues--;

        return true;
    }

    /**
     * Checks the proposed row for duplicates before inserting
     * value into the grid.
     * @param row The index of the row to be checked
     * @param val The proposed value to be checked
     * @return true if row has no duplicates, false if not
     */
    public boolean checkRow(int row, int val)
    {
        for(int i = 0; i < GRID_SIZE; i++)
        {
            if(grid[row][i] == val)
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks the proposed column for duplicates before inserting
     * value into the grid.
     * @param col The index of the column to be checked
     * @param val The proposed value to be checked
     * @return true if column has no duplicates, false if not
     */
    public boolean checkCol(int col, int val)
    {
        for(int i = 0; i < GRID_SIZE; i++)
        {
            if(grid[i][col] == val)
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks the proposed box for duplicates before inserting
     * value into the grid.
     * @param row The row index to be checked
     * @param col The column index to be checked
     * @param val The proposed value to be checked
     * @return true if box has no duplicates, false if not
     */
    public boolean checkBox(int row, int col, int val)
    {
        // Find the top-left coordinates of the box
        int y = row - (row % BOX_SIZE);
        int x = col - (col % BOX_SIZE);

        for(int i = y; i < y + BOX_SIZE; i++)
        {
            for(int j = x; j < x + BOX_SIZE; j++)
            {
                if(grid[i][j] == val)
                {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Checks the cell's surroundings for possible values
     * it could legally hold.
     * @param row The row index to be checked
     * @param col The column index to be checked
     * @return an array of possible values
     */
    public int[] hint(int row, int col)
    {
        // Make an empty list of hints
        int[] hints = new int[0];

        for(int i = 1; i <= GRID_SIZE; i++)
        {
            if(checkRow(row, i) && checkCol(col, i) && checkBox(row, col, i))
            {
                hints = Arrays.copyOf(hints, hints.length + 1);
                hints[hints.length - 1] = i;
            }
        }

        return hints;
    }

    /**
     * Attempts to solve the game by finding where the hint function
     * only gives one value. (I couldn't resist! Once I had the hint
     * function, this was just one step away :)
     * @return true is successful, false if not
     */
    public boolean solve()
    {
        // First, put puzzle back to original set numbers.
        filledValues = 0;
        for(int i = 0; i < GRID_SIZE; i++)
        {
            for(int j = 0; j < GRID_SIZE; j++)
            {
                if(numberIsSet[i][j])
                {
                    filledValues++;
                }
                
                else
                {
                    grid[i][j] = 0;
                }
            }
        }
        
        // Next, find cells with only one possible value, fill them in,
        // and continue until (hopefully) all cells are filled.
        boolean done = false;
        while(!done)
        {
            int previous = filledValues;
            
            for(int i = 0; i < GRID_SIZE; i++)
            {
                for(int j = 0; j < GRID_SIZE; j++)
                {
                    // No need to bother with the number if it is already filled.
                    if(grid[i][j] == 0 && !numberIsSet[i][j])
                    {
                        int[] hint = hint(i, j);

                        if(hint.length == 1)
                        {
                            insertVal(i, j, hint[0]);
                        }
                    }
                }
            }
            
            // If the amount of filled cells stays the same,
            // we are done.
            done = (filledValues == previous);
        }
        
        // If game is won, the solve method is successful
        return win();
    }

    /**
     * Checks to see if the game is won, assuming if all values
     * are filled it must be a victory.
     * @return true if all values are filled, false if not
     */
    public boolean win()
    {
        return (filledValues == MAX_SET_VALUES);
    }
}