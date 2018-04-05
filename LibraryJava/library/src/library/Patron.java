package library;

public class Patron 
{
	public String name;
	public int id;
	public int fine;
	public boolean hasBook;
	public int hasBookId;
	
	public Patron(String patronName, int patronId)
	{
		name = patronName;
		id = patronId;
		fine = 0;
		hasBook = false;
		hasBookId = -1;
	}
	
	public String getName()
	{
		return name;
	}
	
	public int getId()
	{
		return id;
	}
	
	
	
	
	
	public int getFine()
	{
		return fine;
	}
	
	public void addFine(int newFine)
	{
		fine += newFine;
	}
	
	public void minusFine(int newFine)
	{
		fine -= newFine;
	}
	
	
	
	
	
	public void giveBook(int bookId)
	{
		hasBook = true;
		hasBookId = bookId;
	}
	
	public void returnBook()
	{
		hasBook = false;
		hasBookId = -1;
	}
	
	
	
	
	public boolean doesHaveBook()
	{
		return hasBook;
	}
	
	public int doesHaveBookId()
	{
		return hasBookId;
	}
	
}
