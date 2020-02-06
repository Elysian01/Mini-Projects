
package university;

/*
*@author abhishek
*/
public class StudentBean {
    private int rollno;   /* alt + insert to auto generate getters and setters*/
    private String name;
    private String dob;
    private String credits ;

    public String getCredits() {
        return credits;
    }

    public void setCredits(String credits) {
        this.credits = credits;
    }

    public void setRollno(int rollno) {
        this.rollno = rollno;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setDob(String dob) {
        this.dob = dob;
    }

    public int getRollno() {
        return rollno;
    }

    public String getName() {
        return name;
    }

    public String getDob() {
        return dob;
    }
    
    public StudentBean(int rollno, String name , String dob ,String credits) {
        this.rollno = rollno;
        this.name = name;
        this.dob = dob;
        this.credits = credits;
    }
    
}
