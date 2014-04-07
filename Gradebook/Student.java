/**
 * Class that stores students, their names and their grades.
 * @author Josiah Driver
 * @since 04/11/13
 * Class: Intermediate Java
 * Assignment: (Lab3) Create a data analysis program.
 */
public class Student
{
    private double grade; // The student's total grade average
    private String name; // The student's first name

    /**
     * A constructor to create an empty student
     */
    public Student()
    {
        grade = 0.0;
        name = "";
    }

    /**
     * A constructor to create a student object with a name and grade
     * @param name The student name.
     * @param grade The student grade as a percentage of 100
     */
    public Student(String name, double grade)
    {
        this.grade = grade;
        this.name = name;
    }

    /**
     * Accesses the student's grade.
     * @return grade The student's grade
     */
    public double getGrade()
    {        
        return grade;
    }

    /**
     * Accesses the student's name.
     * @return grade The student's name
     */
    public String getName()
    {        
        return name;
    }
    
    /**
     * Changes the student's grade to a new value.
     * @param grade the new grade
     */
    public void changeGrade(double grade)
    {        
        this.grade = grade;
    }

    /**
     * Changes the student's name to a new value.
     * @param name the new name
     */
    public void changeName(String name)
    {        
        this.name = name;
    }
}