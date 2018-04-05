package library;

import java.util.Vector;

public class Patrons 
{
	public Vector<Patron> allPatrons = new Vector<Patron>();
	
	
	//Check if exists
	public boolean idExist(int id)
	{
		for(int i=0; i<allPatrons.size(); i++)
		{
			if(allPatrons.elementAt(i).getId() == id)
			{
				return true;
			}
		}
		return false;
	}
	
	
	
	//add a new patron
	public void newPatron(String patronName, int patronId)
	{
		//create patron tempPatron
		//set name and id 
		Patron tempPatron = new Patron(patronName, patronId);
		//add tempPatron to Patrons 
		allPatrons.add(tempPatron);
		System.out.println(tempPatron.getName() + ", " + tempPatron.getId() + " was added.");
	}
	
	
	//remove a patron
	public void removePatron(int patronId)
	{
		//create temp patron with existing
		boolean wasRemoved = false; 
		
		for(int i=0; i<allPatrons.size(); i++)
		{
			//System.out.println(allPatrons.elementAt(i).getName() + tempPatron.getName());
			//System.out.println(allPatrons.elementAt(i).getId() + tempPatron.getId());
			if((allPatrons.elementAt(i).getId() == patronId))
			{
				System.out.println(allPatrons.elementAt(i).getName() + ", " + patronId + " was removed.");
				allPatrons.removeElementAt(i);
				wasRemoved = true;
			}	
		}
		if(wasRemoved == false)
			System.out.println("Patron did not exist");
	}
	
	//******************************************************************************************
	
	//give patron a fine
	public void addFineToPatron(int patronId, int newFineToAdd)
	{
		for(int i=0;i<allPatrons.size();i++)
		{
			if(allPatrons.elementAt(i).getId() == patronId)
			{
				allPatrons.elementAt(i).addFine(newFineToAdd);
				System.out.println("Fine was added to " + allPatrons.elementAt(i).getName());
				System.out.println("Current fine amount: " + allPatrons.elementAt(i).getFine());
			}
		}
	}
	
	
	//remove patrons fines
	public void minusFineToPatron(int enteredId, int enteredFine)
	{
		for(int i=0;i<allPatrons.size();i++)
		{
			if(allPatrons.elementAt(i).getId() == enteredId)
			{
				allPatrons.elementAt(i).minusFine(enteredFine);
				System.out.println("Fine was subracted from " + allPatrons.elementAt(i).getName());
				System.out.println("Current fine amount: " + allPatrons.elementAt(i).getFine());
			}
			
		}
	}
	
	
	//****************************************************************************************
	
	//Print patron with fines
	public void printFinePatrons()
	{
		boolean hasFine = false;
		for(int i=0;i<allPatrons.size();i++)
		{
			if(allPatrons.elementAt(i).getFine() > 0)
				hasFine = true;
		}
		
		if(hasFine == true)
		{
			System.out.println("Patrons with fines (Name,Id,Fine): ");
			for(int i=0;i<allPatrons.size();i++)
			{
				if(allPatrons.elementAt(i).getFine() > 0)
				{
					System.out.println(allPatrons.elementAt(i).getName()+ ", " + allPatrons.elementAt(i).getId() + ", " + allPatrons.elementAt(i).getFine());
				}
			}
		}
		else
			System.out.println("There are no patrons with fines");
		
		
	}
	
	
	//print all patrons
	public void printPatrons()
	{
		if(!(allPatrons.isEmpty()))
		{
			System.out.println("\nAll Patrons (name, id, fine)");
			for(int i=0; i<allPatrons.size();i++)
			{
				System.out.println(allPatrons.elementAt(i).getName() + ", " + allPatrons.elementAt(i).getId() + ", " + allPatrons.elementAt(i).getFine());
			}
		}
		else
			System.out.println("There are no patrons in the system.");
		
	}
	
	//**************************************************************************************
	
	//patron check out book
	void patronCheckOut(int enteredId, int enteredFine, int enteredBookId)
	{
		for(int i=0; i<allPatrons.size();i++)
		{
			if(allPatrons.elementAt(i).getId() == enteredId)
			{
				allPatrons.elementAt(i).giveBook(enteredBookId);
				allPatrons.elementAt(i).addFine(enteredFine);
				System.out.println("Patron \"" + allPatrons.elementAt(i).getName() + "\" has checked out the book and has a current fine of: $" + allPatrons.elementAt(i).getFine());
			}
		}
	
	}
	
	
	void patronCheckIn(int enteredPatronId, int enteredFine, int enteredBookId)
	{
		for(int i=0; i<allPatrons.size();i++)
		{
			if(allPatrons.elementAt(i).getId() == enteredPatronId)
			{
				allPatrons.elementAt(i).returnBook();
				allPatrons.elementAt(i).minusFine(enteredFine);
				System.out.println("Patron \"" + allPatrons.elementAt(i).getName() + "\" has checked in the book and has a current fine of: $" + allPatrons.elementAt(i).getFine());
			}
		}
	
	}
	
	
}
