package library;

import java.util.Scanner;

public class libMain 
{

	public static void main(String[] args) 
	{
		Patrons LibraryPatronList = new Patrons();
		Books LibraryBookList = new Books();
		
		String enteredName;
		int enteredId, enteredFine;
		String enteredBookAuthor,enteredBookTitle;
		int enteredBookId;
		
		Scanner reader = new Scanner(System.in);
		int menuChoice = -1;
		
		do
		{
			System.out.println("\n--------Library Menu---------");
			System.out.println("0) EXIT");
			System.out.println("\n1) Add a new patron");//done
			System.out.println("2) Remove patron");//done
			System.out.println("3) Give a patron a fine");//done
			System.out.println("4) Remove a patrons fine");//done
			System.out.println("5) Show patron with fines");//done
			System.out.println("6) Show all patrons");//done
			//show all patrons with books
			System.out.println("\n7) Add a new book");//done
			System.out.println("8) Remove a book");//done
			System.out.println("9) Print all books");//done
			System.out.println("10) Print all Checked out books");//done
			System.out.println("\n11) Check-out a book");//done
			System.out.println("12) Check-in a book");//done
			while(!reader.hasNextInt())
			{
				System.out.println("Not an Integer please re-enter");
				reader.next();
			}
			menuChoice = reader.nextInt();
			reader.nextLine();//clears ln in buffer
			
			switch(menuChoice)
			{
				case 0:
					
					break;
					
				case 1://add patron
					System.out.println("Enter the patrons name:");
					enteredName = reader.nextLine();
					System.out.println("Enter the patrons ID");
					//enteredId = reader.nextInt();
					
					//checks if integer
					while(!reader.hasNextInt())
					{
						System.out.println("Not an Integer please re-enter");
						reader.next();
					}
					enteredId = reader.nextInt();
					
					while(LibraryPatronList.idExist(enteredId))
					{
						System.out.println("Id already exists! please re-choose");
						while(!reader.hasNextInt())
						{
							System.out.println("Not an Integer please re-enter");
							reader.next();
						}
						enteredId = reader.nextInt();
					}
					
					LibraryPatronList.newPatron(enteredName, enteredId);
					
					break;
				
				case 2://remove patron
					System.out.println("Enter the patrons ID: ");

					//checks if integer
					while(!reader.hasNextInt())
					{
						System.out.println("Not an Integer please re-enter");
						reader.next();
					}
					enteredId = reader.nextInt();
					
					LibraryPatronList.removePatron(enteredId);
					
					break;
				
				case 3://add fine
					System.out.println("Enter the patrons ID: ");
					//checks if integer
					while(!reader.hasNextInt())
					{
						System.out.println("Not an Integer please re-enter");
						reader.next();
					}
					enteredId = reader.nextInt();
					
					System.out.println("Enter the fine amount: ");
					//checks if integer
					while(!reader.hasNextInt())
					{
						System.out.println("Not an Integer please re-enter");
						reader.next();
					}
					enteredFine = reader.nextInt();
					
					if(LibraryPatronList.idExist(enteredId))
						LibraryPatronList.addFineToPatron(enteredId, enteredFine);
					else
						System.out.println("Patrons ID does not exist");
					
					break;
				case 4://remove patron fine	
					System.out.println("Enter the patrons ID: ");
					while(!reader.hasNextInt())
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredId = reader.nextInt();
					
					System.out.println("Enter the paid amount: ");
					while(!reader.hasNextInt())
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredFine = reader.nextInt();
					if(LibraryPatronList.idExist(enteredId))
						LibraryPatronList.minusFineToPatron(enteredId, enteredFine);
					else
						System.out.println("Patrons ID does not exist.");
					
					break;
					
				case 5://print fine patrons
					LibraryPatronList.printFinePatrons();
					
					break;
					
				case 6://print all patrons
					LibraryPatronList.printPatrons();
					
					break;
					
				case 7://add book
					System.out.println("Enter the Books title: ");
					enteredBookTitle = reader.nextLine();
					System.out.println("Enter the Books author: ");
					enteredBookAuthor = reader.nextLine();
					
					System.out.println("Enter the Books ID: ");
					while(!(reader.hasNextInt()))
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredBookId = reader.nextInt();
					
					while(LibraryBookList.bookIdExist(enteredBookId))
					{
						System.out.println("Book ID already exists please re-enter: ");
						while(!(reader.hasNextInt()))
						{
							System.out.println("Not an integer please re-enter: ");
							reader.next();
						}
						enteredBookId = reader.nextInt();
					}
					
					LibraryBookList.addBook(enteredBookTitle, enteredBookAuthor, enteredBookId);
					
					break;
					
				case 8://remove Book
					System.out.println("Enter the books ID: ");
					while(!reader.hasNextInt())
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredBookId = reader.nextInt();
					
					LibraryBookList.removeBook(enteredBookId);
					
					break;
					
				case 9:
					LibraryBookList.printAllBooks();
					
					break;
					
				case 10:
					LibraryBookList.printCheckedOut();
					
					break;
					
				case 11://check out
					System.out.println("Enter the patrons ID: ");
					while(!reader.hasNextInt())
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredId = reader.nextInt();
					
					
					System.out.println("Enter the books ID: ");
					while(!reader.hasNextInt())
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredBookId = reader.nextInt();
					
					System.out.println("Enter the fine amount for the patron: ");
					while(!reader.hasNextInt())
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredFine = reader.nextInt();
					if((LibraryPatronList.idExist(enteredId)) && (LibraryBookList.bookIdExist(enteredBookId)) && !(LibraryBookList.idCheckedOut(enteredBookId)))
					{
						LibraryPatronList.patronCheckOut(enteredId, enteredFine, enteredBookId);
						LibraryBookList.checkOutBook(enteredBookId);
					}
					else
						System.out.println("Book or partron ID did not exist or book is allready checked out");
					
					break;
					
				case 12://check in
					System.out.println("Enter the patrons ID: ");
					while(!reader.hasNextInt())
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredId = reader.nextInt();
					
					
					System.out.println("Enter the books ID: ");
					while(!reader.hasNextInt())
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredBookId = reader.nextInt();
					
					System.out.println("Enter the fine amount for the patron: ");
					while(!reader.hasNextInt())
					{
						System.out.println("Not an integer please re-enter: ");
						reader.next();
					}
					enteredFine = reader.nextInt();
					
					if((LibraryPatronList.idExist(enteredId))&&(LibraryBookList.bookIdExist(enteredBookId))&&(LibraryBookList.idCheckedOut(enteredId)))
					{
						LibraryPatronList.patronCheckIn(enteredId, enteredFine, enteredBookId);
						LibraryBookList.checkInBook(enteredBookId);
					}
					else
						System.out.println("Book or partron ID did not exist or the book is not checked out.");
					
					
					break;
				
				default:
					System.out.println("Not an option choice! Please re-enter");
			}
			

		}while(menuChoice != 0);
	
		
		reader.close();
	}

}
