#include"BLheader.h"


//************************
//main
//************************
//takes in a file
int main(int argc, char *argv[])
//int main()
{
	
	int size = 100;
	char input[size];
	
	//test strings for me
	string test = "write adam aobj 10";
	string test2 = "read adam aobj";
	string test3 = "read adam jobj";
	
	//creates  a RefMon object
	RefMon refMon;
	
	//create subjects
	refMon.createSub("adam");
	refMon.createSub("james");
	refMon.createSub("tim");
	refMon.createSub("sara");
	refMon.createSub("kristy");
	refMon.createSub("liz");

	//create objects
	refMon.createObj("aobj");
	refMon.createObj("jobj");
	refMon.createObj("tobj");
	refMon.createObj("sobj");
	refMon.createObj("kobj");
	refMon.createObj("lobj");
	
	
//	refMon.instructCheck(test);
//	refMon.instructCheck(test2);
//	refMon.instructCheck(test3);
	
	//should be 2 if not then theyre doing it wrong
	if (argc != 2)
	{
		cout << "Error" << endl;
		return 1;
	}
	//reades file line by line and sends it to instructionCheck
	else
	{
		//argv1 = filename
		ifstream inFile(argv[1]);
		
		//if cannot open file
		if(!inFile.is_open())
		{
			cout << "Cannot open file!!";
			return 1;
		}
		else
		{
			//this was giving me trouble. had while(!infile.is_open). infinate loop
			while(inFile != NULL)
			{
				//gets liine by line
				inFile.getline(input, size);
			
				//call instructCheck
				refMon.instructCheck(input);
			}
		}
	}
	
	//inFile.close();
	
	return 0;
}


