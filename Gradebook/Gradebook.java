import java.util.ArrayList;

/**
 * Class that stores student grades.
 * @author Josiah Driver
 * @since 04/11/13
 * Class: Intermediate Java
 * Assignment: (Lab3) Create a data analysis program.
 */
public class Gradebook
{
    // The list of student objects in the grade book
    private static ArrayList<Student> students;

    /**
     * A constructor to set up an empty grade book
     */
    public Gradebook()
    {
        students = new ArrayList<Student>();
    }

    /**
     * Adds a student to the list
     * @param name the student's name
     * @param grade the student's grade
     */
    public void add(String name, double grade)
    {
        students.add(new Student(name, grade));
    }
    
    /**
     * Removes a student from the list
     * @param index the student's list index
     */
    public void remove(int index)
    {
        students.remove(index);
    }
    
    /**
     * Gets a particular student's grade
     * @param index the student's list index
     * @return the student's grade
     */
    public double getStudentGrade(int index)
    {
        return students.get(index).getGrade();
    }
    
    /**
     * Gets a particular student's name
     * @param index the student's list index
     * @return the student's name
     */
    public String getStudentName(int index)
    {
        return students.get(index).getName();
    }

    /**
     * Finds the average grade of all the students.
     * @return average grade as a percentage of 100
     */
    public double mean()
    {        
        double sum = 0;

        for(int i = 0; i < students.size(); i++)
        {
            sum += getStudentGrade(i);
        }

        // Guard against dividing by zero
        return (students.size() > 0) ? sum / students.size() : 0;
    }

    /**
     * Finds the standard deviation of the grades from the mean.
     * @return the standard deviation
     */
    public double standardDeviation()
    {        
        double sum = 0;
        double mean = mean();

        for(int i = 0; i < students.size(); i++)
        {
            sum += Math.pow((getStudentGrade(i) - mean), 2);
        }

        // Guard against dividing by zero
        return (students.size() > 0) ? Math.sqrt(sum / students.size()) : 0;
    }
    
    /**
     * Finds the largest grade in the list.
     * @return the maximum grade as a percentage of 100
     */
    public double max()
    {        
        if(students.size() <= 0)
            return 0;

        double max = students.get(0).getGrade();
        
        for(int i = 1; i < students.size(); i++)
        {
            max = Math.max(students.get(i).getGrade(), max);
        }

        return max;
    }
    
    /**
     * Finds the smallest grade in the list.
     * @return the minimum grade as a percentage of 100
     */
    public double min()
    {        
        if(students.size() <= 0)
            return 0;

        double min = students.get(0).getGrade();
        
        for(int i = 1; i < students.size(); i++)
        {
            min = Math.min(students.get(i).getGrade(), min);
        }

        return min;
    }
    
    /**
     * Finds the range of grades in the list.
     * @return the range as the difference between the two extremes
     */
    public double range()
    {        
        return max() - min();
    }

    /**
     * Helper method for quick sort.
     */
    public void sort()
    {
        quicksort(0, students.size() - 1, true);
    }
    
    /**
     * Helper method for quick sort.
     * @param descending if true, sort from highest to lowest
     */
    public void sort(boolean descending)
    {
        quicksort(0, students.size() - 1, descending);
    }
    
    /**
     * Sorts the students according to their grades in descending
     * order, from the highest to the lowest, using a very basic
     * version of the quick sort method.
     * @param i the leftmost boundary index (always should start at 0)
     * @param j the rightmost boundary index (always should start at n - 1)
     * @param d if true, sort from highest to lowest, else vice-versa.
     */
    private void quicksort(int i, int j, boolean d)
    {        
        // Base case: if sub array length <= 1, it is sorted
        if((j - i) + 1 <= 1) return;

        // Take a value from the middle of the array for the pivot
        double p = getStudentGrade((j + i) / 2);

        int k = i, l = j;
        
        while(k <= l)
        {
            // Sort from highest to lowest
            if(d)
            {   
                while (getStudentGrade(k) > p) k++;
                while (getStudentGrade(l) < p) l--;
            }
            
            // Otherwise, sort from lowest to highest
            else
            {
                while (getStudentGrade(k) < p) k++;
                while (getStudentGrade(l) > p) l--;
            }

            // Swap elements if k and l have not crossed each other
            // and move them up and down respectively by one index
            if(k <= l)
            {
                swap(k, l);
                k++;
                l--;
            }
        }

        // Recursively sort the two sub arrays with bounds
        // [i, l] and [k, j] because k and l have crossed
        quicksort(i, l, d);
        quicksort(k, j, d);
    }

    /**
     * Swaps the two students with indices i and j.
     * @param i the index of the first student
     * @param j the index of the second student
     */
    private void swap(int i, int j)
    {        
        Student hold = students.get(i);
        students.set(i, students.get(j));
        students.set(j, hold);
    }

    /**
     * Returns a string with a visual table of the
     * entire grade book
     * @return the string containing the table
     */
    public String printBook()
    {
        final int MIN_NAME_LENGTH = 4;
        
        // Find the length of the longest student name and make
        // sure it's at least 4
        int nameLength = Math.max(getLongestNameLength(), MIN_NAME_LENGTH);
        
        // Make top border
        String border = "+-----+-";
        
        for(int i = 0; i < nameLength; i++)
            border += "-";
        
        border += "-+----------+\n";
        
        // Create header
        String output = border;
        output += "| #   | " + String.format("%-" + nameLength + "s", "Name");
        output += " | Grade    |\n" + border;
        
        // Print each student's results
        for(int i = 0; i < students.size(); i++)
        {
            output += "| " + String.format("%3d", i);
            output += " | " + String.format("%-" + nameLength + "s", getStudentName(i));
            output += " | " + String.format("%8.2f", getStudentGrade(i)) + " |\n";
        }
        
        output += border;
        return output;
    }
    
    /**
     * Gets the length of the longest name in the list
     * @return the length of the longest name
     */
    private int getLongestNameLength()
    {
        int max = 0;
        
        for(Student s : students)
            max = Math.max(s.getName().length(), max);

        return max;
    }
    
    /**
     * Graphs in visual format the number of students
     * in each percentile range of ten (so, from 100%
     * to 90%, 90% to 80%, etc).
     * @return a String containing the visual graph
     */
    public String graph()
    {
        final int NUM_OF_RANGES = 10;
        final int GRAPH_HEIGHT = 12;
        final int NUM_SECTIONS = 4;
        
        // Create an array to hold the number of student in each tenth percentile
        int[] ranges = new int[NUM_OF_RANGES];
        
        // Initialize variables.
        int max = 0;
        int index = 0;
        int marker = 0;
        boolean isMarkerInt = false;
        boolean isRowMarker = false;
        
        for(Student s : students)
        {
            // Take the percentage, strip the decimals and the
            // digit in the tens place to get a nifty index.
            index = (int) s.getGrade();
            index /= 10;
            
            // Guard against index out of bounds
            index = (index >= NUM_OF_RANGES) ? NUM_OF_RANGES - 1 : index;
            
            ranges[index]++;
            max = Math.max(ranges[index], max);
        }
        
        // Begin creating graph
        String output = String.format("%6d", max);
        output += " +------------------------------------------+\n";
        
        // Label on the side of the graph (backwards)
        String side = "   STNEDUTS ";
        
        // Iterate from the top to the bottom of the graph
        for(int i = GRAPH_HEIGHT - 1; i > 0; i--)
        {
            // Add label to the side
            output += side.charAt(i);
            
            // Make marker equal to max times the ratio of i to
            // graph height, while checking if marker is whole number
            marker = max * i;
            isMarkerInt = marker % GRAPH_HEIGHT == 0;
            marker /= GRAPH_HEIGHT;
            
            // Checks if row is one to hold a marker number
            isRowMarker = i % (GRAPH_HEIGHT / NUM_SECTIONS) == 0;
                        
            // If so, print marker number
            if(isRowMarker && isMarkerInt)
            {
                output += String.format("%5d", marker);
            }
            
            else
            {
                output += "     ";
            }
            
            output += " |";
            
            // check each range to see if it's size is at least this high 
            for(int j = NUM_OF_RANGES - 1; j >= 0; j--)
            {
                // Place a 1.0 in to make output a double
                if(ranges[j] >= (max * (i * 1.0) / GRAPH_HEIGHT))
                {
                    output += "  XX";
                }
                
                else
                {
                    output += "    ";
                }
            }
            
            output += "  |\n";
        }
        
        output += "     0 +------------------------------------------+\n";
        output += "       100% 90% 80% 70% 60% 50% 40% 30% 20% 10% 0%\n\n";
        output += "                  G R A D E   R A N G E\n";
        
        return output;
    }
    
    /**
     * Retrieves the max exiting index in students.
     * @return the max index, -1 if no entries
     */
    public int maxIndex()
    {
        return students.size() - 1;
    }
}