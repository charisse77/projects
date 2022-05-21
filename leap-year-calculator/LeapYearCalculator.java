package finalProjectHilton;
import java.util.Scanner;

public class LeapYearCalculator {
	protected static int YEAR_MIN = 1752; 
	protected static int YEAR_MAX = 9999; 
	protected static int DIVISIBLEBY400 = 400; 
	protected static int DIVISIBLEBY4 = 4;
	protected static int DIVISIBLEBY100 = 100;

	
	public static void main(String[] args) { //entry point of Java program
		System.out.println("This program will determine leap years within a given range."); 
	    System.out.println("Enter years between 1752 and 9999");
	    System.out.println("Enter a minimum year"); 
		Scanner inYearMin = new Scanner(System.in); //Create a Scanner Object
		int yearMin = inYearMin.nextInt(); //read user input
		System.out.println("Enter a maximum year"); 
		Scanner inYearMax = new Scanner(System.in); //Create scanner object
		int yearMax = inYearMax.nextInt(); //read user input
		while(yearMin<YEAR_MIN || yearMax>YEAR_MAX) {
			System.out.println("Please enter a value between 1752 and 9999");
			System.out.println("Enter a minimum year"); 
			yearMin = inYearMin.nextInt(); //read user input
			System.out.println("Enter a maximum year"); 
			yearMax = inYearMax.nextInt(); //read user input
		}
		for(int i=yearMin; i<=yearMax;  i++) {
			if(i% DIVISIBLEBY100==0 && i% DIVISIBLEBY400!=0){
		
				}else if(i% DIVISIBLEBY400==0 || i% DIVISIBLEBY4 ==0) {
					System.out.println(i);
				}
		}//END FOR LOOP 
		System.out.println("Leap years are listed above. If there were no outputs no leap years were found in this range.");
	}//END MAIN METHOD
}//END CLASS

