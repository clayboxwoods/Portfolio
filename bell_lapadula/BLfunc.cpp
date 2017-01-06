#include"BLheader.h"



//*********************
//constructor
//********************
//initially gives the values
Subjects::Subjects(string name)
{
	subName = name;
	subValue = 0;
}

//initially gives the values
Objects::Objects(string name)
{
	objName = name;
	objValue = 0;
}


//**********************
//getters and setters
//**********************

//set object value
void Objects::setObjValue(int value)
{
	objValue = value;
}

//set subject value
void Subjects::setSubValue(int value)
{
	subValue = value;
}


//gets subject value
int Subjects::getSubValue()
{
	return subValue;
	
}

//gets object value
int Objects::getObjValue()
{
	return objValue;
}

//gets subject Name
string Subjects::getSubName()
{
	return subName;
}

//gets object name
string Objects::getObjName()
{
	return objName;
}

//************************
//create ob/sub
//*************************

//creates subjects, puts them in refMon vectors
void RefMon::createSub(string name)
{
	subjects.push_back(Subjects (name));
}
//creates objects, puts them in refMon vectors
void RefMon::createObj(string name)
{
	objects.push_back(Objects (name));
	
}


//************************************
//dont need but left in for me
//*************************************

//gets the subject at that number
Subjects RefMon::getSubjects(int num)
{
	return subjects[num];
} 

//gets the subject at that number
Objects RefMon::getObjects(int num)
{
	return objects[num];
}

//************************
//referance monitor
//************************
//first creates array of strings for security lvl
//splits up the input into each work
//checks if the objects and subjects work
void RefMon::refMonCheck(string input)
{
	bool denied = false;
	bool badInstruct = true;
	
	//create the security levels
	int secLvl[6] = {1,2,3,1,2,3};
	
	
	
	//parses the input into seperate words
	//sets each word to the correlating string
	stringstream ss(input);
	
	string token, action, inputSub, inputObj;
	int i=0, value;
	
	while(ss >> token)
	{
		if(i == 0)
			action = token;
		else if(i == 1)
			inputSub = token;
		else if(i == 2)
		{
			inputObj = token;
			ss >> value;
		}
				
		i++;
	}
	
	
	//if the user puts in a bad subject or object this will say bad instructions
	//for some reason this doesnt work
	for(int i=0;i<subjects.size();i++)
	{
		if(subjects[i].getSubName() == inputSub)
		{
			//cout << "hererererer" <<endl;
			badInstruct = false;
		}
			
	}
	for(int i=0;i<objects.size();i++)
	{
		if(objects[i].getObjName() == inputObj)
			badInstruct = false;
	}
	
	
	
	
	//check if access granted or denied
	//runs through subjects till it finds the right element
	//if read
	if(action == "read")
	{
		//if subject security = high then read
		//if = Medium and obj isnt high then read
		//if = low and object = low then read
		for(int i =0;i<subjects.size();i++)
		{
			if(subjects[i].getSubName() == inputSub)
			{
				for(int j=0;j<objects.size();j++)
				{
					if(objects[j].getObjName() == inputObj)
					{
						if(secLvl[i] >= secLvl[j])
						{
							subjects[i].setSubValue(objects[j].getObjValue());
							break;
						}
						else
						{
							denied = true;
							break;
						}
						
					}
					
				}
				
			}
			
		}
			
	}
	//runs through subjects till it finds the right element
	//when write
	else
	{
		//if sub = low then write
		//if = medium and obj = med/high then write
		//if = high and obj = high then write
		for(int i =0;i<subjects.size();i++)
		{
			if(subjects[i].getSubName() == inputSub)
			{
				for(int j=0;j<objects.size();j++)
				{
					if(objects[j].getObjName() == inputObj)
					{
						if(secLvl[i] <= secLvl[j])
						{
							objects[j].setObjValue(value);
							break;
						}
						else
						{
							denied = true;
							break;
						}
					}
				}
				
			}
		}
	}
	
	
	//doesnt enter if for some reason
	if(badInstruct == true)
		cout << "Bad Instruction: " << input << endl;
	
	//if granted then print out statues
	if(denied == false && badInstruct == false)
	{
		cout << "Access granted: " << input << endl;
		printState();
	}
	else
		cout << "Access denied: " << input << endl;
	
}//end of refMon



//**************************
//instruction check/list
//**************************
//parses into afew
int RefMon::instructCheck(string input)
{
	
	//sent line for line of file
	//each line gets checked 
	
	//ss takes each word of the string seperately
	stringstream ss(input);
	
	
	bool isRead = false, badInstruct = false;
	string token;
	int value,i = 0;
	
	while(ss >> token)
	{
		if(i == 0)
		{
			//if the first token is read 
			if(token == "read")
				isRead = true;				
			//if first token is wirite
			else if(token == "write"){}
			//if neither then bad instruction
			else
				badInstruct = true;
		}
		//simply counter
		i++;
	}
	
	//if its a read instruction
	if(isRead == true)
	{
		
		//is there isnt 3 tokens in input its a badinstuction
		if(i != 3)
			badInstruct = true;
		else
			refMonCheck(input);
	}
	//if its a write instruction
	else if(isRead == false && badInstruct == false)
	{
		//if there arent 4 tokens its a badinstruction
		if(i != 4)
			badInstruct = true;
		else
			refMonCheck(input);
			
	}
	
	//if bad print: bad instruction: (instruction)
	if(badInstruct == true)
		cout << "Bad instruction: " << input << endl;
	
	return 0;
}



//********************************
//print srate
//**********************************
void RefMon::printState()
{
	cout << "+---------------------------------------------The current state is----------------------------------------------+" <<endl;
	cout << "|Subject\t|";
	for(int i=0; i<6; i++)
	{
		cout << "\t" << subjects[i].getSubName() << "\t|";
	}
	cout << "\n|Value   \t|"; 
	for(int i=0; i<6; i++)
	{
		cout << "\t" << subjects[i].getSubValue() << "\t|";
	}
	
	cout << "\n+---------------------------------------------------------------------------------------------------------------+" <<endl;
	cout << "|Objects\t|";
	for(int i=0; i<6; i++)
	{
		cout << "\t" << objects[i].getObjName() << "\t|";
	}
	cout << "\n|Value   \t|"; 
	for(int i=0; i<6; i++)
	{
		cout << "\t" << objects[i].getObjValue() << "\t|";
	}
	
	cout << "\n+---------------------------------------------------------------------------------------------------------------+" <<endl;
	
	cout << endl;
}

