import java.io.*;
import java.util.NoSuchElementException;
import java.util.Scanner;

/**
 * Allows a user to input a file of grades and view the data
 * @author Josiah Driver
 * @since 04/11/13
 * Class: Intermediate Java
 * Assignment: (Lab3) Create a data analysis program.
 */
public class DataCenter
{
    public static void main(String[] args)
    {
        // Make a grade book
        Gradebook gradebook = new Gradebook();

        // Initialize program run variables
        boolean valid = false;
        Scanner console = new Scanner(System.in);
        File inputFile = null;
        Scanner in = null;

        // Make the user aware of the way the program works
        System.out.println("This program will read a text file containing student");
        System.out.println("grades. Every line in the text file should contain one");
        System.out.println("student's name and grade delimited by a tab character.\n");

        // Prompt for the input and output file names
        while(!valid)
        {
            try
            {                
                System.out.print("Enter the name of the grade file: ");
                String inputFileName = console.next();

                // Construct the Scanner and PrintWriter objects for reading and writing
                inputFile = new File(inputFileName);                
                in = new Scanner(inputFile);

                // If no exception is generated, then our filename is valid
                valid = true;
                System.out.println("File has been successfully found.\n");
            }

            catch(FileNotFoundException exception)
            {
                System.out.println("File not found. Please try again.\n");
            }
        }

        // Keeps track of corrupted lines
        int corruptLines = 0;

        while(in.hasNextLine())
        {
            try
            {
                Scanner line = new Scanner(in.nextLine());
                String name = line.next();
                double grade = line.nextDouble();

                gradebook.add(name, grade);
            }

            catch(NoSuchElementException exception)
            {
                corruptLines++;
            }
        }

        // Let the user know if there were corrupt lines
        if(corruptLines == 1)
        {
            System.out.println("Found 1 corrupted line.\n"
                + "It will not be added to the list.\nCheck your file.\n");
        }

        else if(corruptLines > 0)
        {
            System.out.println("Found " + corruptLines + " corrupted lines.\n" +
                    "They will not be added to the list.\nCheck your file.\n");
        }

        // Prompt the user for input to view or manipulate the data
        System.out.print("Please enter a command ('help' for help): ");

        while(console.hasNext())
        {
            String command = console.next();

            // Consume any additional input
            console.nextLine();
            
            if(command.equalsIgnoreCase("help"))
            {
                System.out.println();
                System.out.println("Here are all the commands you may enter:");
                System.out.println(" - 'help' for help.");
                System.out.println(" - 'avg' to see the average grade.");
                System.out.println(" - 'dev' to see the standard deviation of the grades.");
                System.out.println(" - 'max' to see the highest grade.");
                System.out.println(" - 'min' to see the lowest grade.");
                System.out.println(" - 'range' to see the range of the grades.");
                System.out.println(" - 'graph' to see the grades visually graphed.");
                System.out.println(" - 'print' to see the grades in table form.");
                System.out.println(" - 'sort:asc' to sort the grades from lowest to highest.");
                System.out.println(" - 'sort:desc' to sort the grades from highest to lowest.");
                System.out.println(" - (an integer) to see information for the student at");
                System.out.println("       that index");
                System.out.println(" - 'quit' to quit.");
                System.out.println();
            }

            else if(command.equalsIgnoreCase("avg"))
            {
                System.out.println();
                System.out.print("The average grade is: ");
                System.out.printf("%.2f", gradebook.mean());
                System.out.println(" %\n");
            }

            else if(command.equalsIgnoreCase("dev"))
            {
                System.out.println();
                System.out.print("The standard deviation is: ");
                System.out.printf("%.2f", gradebook.standardDeviation());
                System.out.println(" %\n");
            }
            
            else if(command.equalsIgnoreCase("max"))
            {
                System.out.println();
                System.out.print("The maximum grade is: ");
                System.out.printf("%.2f", gradebook.max());
                System.out.println(" %\n");
            }
            
            else if(command.equalsIgnoreCase("min"))
            {
                System.out.println();
                System.out.print("The minimum grade is: ");
                System.out.printf("%.2f", gradebook.min());
                System.out.println(" %\n");
            }
            
            else if(command.equalsIgnoreCase("range"))
            {
                System.out.println();
                System.out.print("The range between the extreme grades is: ");
                System.out.printf("%.2f", gradebook.range());
                System.out.println(" %\n");
            }

            else if(command.equalsIgnoreCase("graph"))
            {
                System.out.println();
                System.out.print(gradebook.graph());
                System.out.println();
            }
            
            else if(command.equalsIgnoreCase("print"))
            {
                System.out.println();
                System.out.print(gradebook.printBook());
                System.out.println();
            }

            else if(command.equalsIgnoreCase("sort:asc"))
            {
                gradebook.sort(false);
                System.out.println("\nGrade book sorted. Type 'print' to see the results.\n");
            }

            else if(command.equalsIgnoreCase("sort:desc"))
            {
                gradebook.sort();
                System.out.println("\nGrade book sorted. Type 'print' to see the results.\n");
            }

            else if(command.equalsIgnoreCase("quit"))
            {
                System.out.println("\nGoodbye.\n");
                return;
            }

            else
            {
                // Set to invalid value
                int index = -1;
               
                try
                {
                    index = Integer.parseInt(command);
                    
                    if(index >= 0 && index <= gradebook.maxIndex())
                    {
                        System.out.println("\nInformation for student " + index + ":");
                        System.out.println(" - Name:  " + gradebook.getStudentName(index));
                        System.out.println(" - Grade: " + gradebook.getStudentGrade(index)
                            + " points\n");
                    }

                    else
                    {
                        System.out.println("\nA student does not exist at that index.\n");
                    }
                }
                
                catch(NumberFormatException exception)
                {
                    System.out.println("\nUnrecognized command. Please try again.\n");
                    valid = false;
                }
            }            

            System.out.print("Please enter a command ('help' for help): ");
        }
    }
}