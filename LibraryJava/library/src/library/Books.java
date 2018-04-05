package library;

import java.util.Vector;

public class Books 
{
	
	Vector<Book> allBooks = new Vector<Book>();
	
	
	public boolean bookIdExist(int enteredId)
	{
		
		for(int i=0; i< allBooks.size();i++)
		{
			if(allBooks.elementAt(i).getBookId() == enteredId)
				return true;
		}
		
		return false;
	}
	
	
	public boolean idCheckedOut(int enteredId)
	{
		for (int i = 0; i < allBooks.size(); i++)
		{
			if((allBooks.elementAt(i).getBookId() == enteredId) && (allBooks.elementAt(i).getCheckedOut()))
			{
				return true;
			}
		}
		
		return false;
	}
	
	
	//**********************************************************************************
	
	//add new book
	public void addBook(String enteredTitle, String enteredAuthor, int enteredId)
	{
		Book tempBook = new Book(enteredTitle, enteredAuthor, enteredId);
		allBooks.add(tempBook);
		System.out.println(enteredTitle + ", " + enteredAuthor + ", " + enteredId + " Was added");
	}
	
	
	//remove book
	public void removeBook(int enteredId)
	{
		for (int i = 0; i < allBooks.size(); i++)
		{
			if(allBooks.elementAt(i).getBookId() == enteredId)
			{
				System.out.println(allBooks.elementAt(i).getTitle() + ", " + allBooks.elementAt(i).getAuthor() + ", " + allBooks.elementAt(i).getBookId() + " was removed");
				allBooks.removeElementAt(i);
			}
			else
				System.out.println("No book Found.");
		}
	}
	
	
	//**********************************************************************************
	
	//check out a book
	void checkOutBook(int enteredBookId)
	{
		for (int i=0; i < allBooks.size(); i++) 
		{
			if(allBooks.elementAt(i).getBookId() == enteredBookId)
				allBooks.elementAt(i).makeCheckedOut();
		}
	}
	
	//check in a book
	void checkInBook(int enteredBookId)
	{
		for (int i=0; i < allBooks.size(); i++) 
		{
			if(allBooks.elementAt(i).getBookId() == enteredBookId)
				allBooks.elementAt(i).makeCheckedIn();
		}
	}
	
	
	//*****************************************************************************************
	
	//print all books
	void printAllBooks()
	{
		if(allBooks.isEmpty())
		{
			System.out.println("There are no books on file.");
		}
		else
		{
			System.out.println("All books on file.\nTitle, Author, ID, is checked out");
			for (int i = 0; i < allBooks.size(); i++)
			{
				System.out.println(allBooks.elementAt(i).getTitle() + ", " + allBooks.elementAt(i).getAuthor() + ", " + allBooks.elementAt(i).getBookId() + ", " + allBooks.elementAt(i).getCheckedOut());
			}
		}
		
	}
	
	
	//print checked out books
	void printCheckedOut()
	{
		if(allBooks.isEmpty())
		{
			System.out.println("There are no books on file.");
		}
		else
		{
			boolean hasCheckedOut = false;
			
			for (int i = 0; i < allBooks.size(); i++)
			{
				if(allBooks.elementAt(i).getCheckedOut())
				{
					hasCheckedOut = true;
				}
			}		
			
			if(hasCheckedOut == true)
			{
			
				System.out.println("All checked out books\nTitle, Author, ID, is checked out");
				for (int i = 0; i < allBooks.size(); i++)
				{
					if(allBooks.elementAt(i).getCheckedOut())
						System.out.println(allBooks.elementAt(i).getTitle() + ", " + allBooks.elementAt(i).getAuthor() + ", " + allBooks.elementAt(i).getBookId() + ", " + allBooks.elementAt(i).getCheckedOut());
				}
			}
			else
				System.out.println("There are no books checked out.");
		}
		
		
				
	}
	
	
}
