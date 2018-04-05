package library;

public class Book 
{
	
	public String title;
	public String author;
	public int id;
	public boolean checkedOut;
	
	
	public Book(String enteredTitle, String enteredAuthor, int enteredId) 
	{
		title = enteredTitle;
		author = enteredAuthor;
		id = enteredId;
		checkedOut = false;
	}
	
	public String getTitle()
	{
		return title;
	}
	
	public String getAuthor()
	{
		return author;
	}
	
	public int getBookId()
	{
		return id;
	}
	
	
	
	
	public boolean getCheckedOut()
	{
		return checkedOut;
	}
	
	public void makeCheckedOut()
	{
		checkedOut = true;
	}
	
	public void makeCheckedIn()
	{
		checkedOut = false;
	}
}
